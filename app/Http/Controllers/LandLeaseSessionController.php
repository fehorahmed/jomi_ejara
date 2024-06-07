<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\DagList;
use App\Models\LandLease;
use App\Models\LandLeaseSession;
use App\Models\TransactionLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandLeaseSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LandLeaseSession::orderBy('id', 'DESC')->paginate(15);
        return view('admin.lease_session.index', compact('datas'));
    }


    public function allLeasePayment()
    {
        $datas = TransactionLog::where('land_lease_session_id', '!=', null)->orderBy('id', 'DESC')->paginate(15);
        return view('admin.payments.lease_payments', compact('datas'));
    }
    public function leaseSessionPaymentDetails($land_lease_session)
    {
        $data = LandLeaseSession::findOrFail($land_lease_session);
        return view('admin.payments.lease_payment_details', compact('data'));
    }

    public function leasePaymentDetailPrint($transaction_log)
    {
        $data = TransactionLog::findOrFail($transaction_log);

        return view('admin.pdf.payment_detail', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LandLeaseSession $landLeaseSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LandLeaseSession $landLeaseSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandLeaseSession $landLeaseSession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandLeaseSession $landLeaseSession)
    {
        //
    }
    public function leaseSessionCreate()
    {


        $land_leases = LandLease::where('status', 'ACTIVE')->get();

        $currentDate = Carbon::now();
        // ->format('Y-m-d');
        $julyFirst = Carbon::create(Carbon::now()->year, 7, 1);
        if ($currentDate->lessThan($julyFirst)) {
            $session = Carbon::now()->year - 1 . '-' . Carbon::now()->year;
        } else {
            $session = Carbon::now()->year  . '-' . Carbon::now()->year + 1;
        }
        //  dd($land_leases);

        $vat_rate = Helper::get_config('vat') ?? 0;
        $tax_rate = Helper::get_config('tax') ?? 0;

        foreach ($land_leases as  $land_lease) {

            if ($land_lease->last_payment_session) {
                $year = explode('-', $land_lease->last_payment_session);
                if (isset($year[1])) {
                    for ($i = $year[1]; $i <= Carbon::now()->year; $i++) {
                        if ($currentDate->lessThan($julyFirst)) {
                            if ($i == Carbon::now()->year) {
                                break;
                            }
                        }

                        $s_new = $i . '-' . $i + 1;
                        $ck_session = LandLeaseSession::where('user_id', $land_lease->user_id)
                            ->where('dag_list_id', $land_lease->dag_list_id)
                            ->where('session', $s_new)
                            ->first();

                        if (!$ck_session) {

                            $new_session = new LandLeaseSession();
                            $new_session->user_id = $land_lease->user_id;
                            $new_session->dag_list_id = $land_lease->dag_list_id;
                            $new_session->session = $s_new;
                            $new_session->land_lease_id = $land_lease->id;

                            //Amount Calculation
                            $dag_list = DagList::find($land_lease->dag_list_id);
                            $rate = $dag_list->ejaraRate->amount ?? 0;
                            $landAmount = $dag_list->land_amount ?? 0;
                            $total = $landAmount * $rate;
                            $vat = $total * ($vat_rate / 100);
                            $tax = $total * ($tax_rate / 100);
                            $totalAmount = $total + $vat + $tax;
                            //Amount Calculation
                            $new_session->amount = $total;
                            $new_session->vat = $vat;
                            $new_session->tax = $tax;
                            $new_session->total_amount = $totalAmount;
                            $new_session->paid_amount = 0;
                            $new_session->status = 'DUE';
                            $new_session->created_by = auth()->id();
                            $new_session->save();
                        }
                        if ($s_new == $session) {
                            break;
                        }
                    }
                }
            } else {
                $ck_session = LandLeaseSession::where('user_id', $land_lease->user_id)
                    ->where('dag_list_id', $land_lease->dag_list_id)
                    ->where('session', $session)
                    ->first();

                if (!$ck_session) {

                    $new_session = new LandLeaseSession();
                    $new_session->user_id = $land_lease->user_id;
                    $new_session->dag_list_id = $land_lease->dag_list_id;
                    $new_session->session = $session;
                    $new_session->land_lease_id = $land_lease->id;

                    //Amount Calculation
                    $dag_list = DagList::find($land_lease->dag_list_id);
                    $rate = $dag_list->ejaraRate->amount ?? 0;
                    $landAmount = $dag_list->land_amount ?? 0;
                    $total = $landAmount * $rate;
                    $vat = $total * ($vat_rate / 100);
                    $tax = $total * ($tax_rate / 100);
                    $totalAmount = $total + $vat + $tax;
                    //Amount Calculation
                    $new_session->amount = $total;
                    $new_session->vat = $vat;
                    $new_session->tax = $tax;
                    $new_session->total_amount = $totalAmount;
                    $new_session->paid_amount = 0;
                    $new_session->status = 'DUE';
                    $new_session->created_by = auth()->id();
                    $new_session->save();
                }
            }
        }


        return response([
            'status' => true,
            'message' => 'Successfully Session updated.',
        ]);
    }

    public function leaseSessionPayment($land_lease_session)
    {
        $landLeaseSession = LandLeaseSession::findOrFail($land_lease_session);


        return view('admin.lease_session.make_payment', compact('landLeaseSession'));
    }
    public function leaseSessionPaymentStore(Request $request, $land_lease_session)
    {

        $request->validate([
            "payment_option" => 'required|string',
            "amount" => 'required|numeric',
            "nagad_fee" => 'nullable|required_if:payment_option,NAGAD',
            "bank_name" => 'nullable|required_if:payment_option,BANK',
            "branch_name" => 'nullable|required_if:payment_option,BANK',
            "account_no" => 'nullable|required_if:payment_option,BANK',
            "pay_order_no" => 'nullable|required_if:payment_option,BANK',
            "transaction_number" => 'nullable|required_if:payment_option,NAGAD|required_if:payment_option,BKASH',
            "transaction_id" => 'nullable|required_if:payment_option,NAGAD|required_if:payment_option,BKASH',
            "reference" => 'nullable|string',
            "receipt_no" => 'nullable|required_if:payment_option,CASH',
            "date" => 'required|date'
        ]);


        $landLeaseSession = LandLeaseSession::findOrFail($land_lease_session);

        $need_amount =  $landLeaseSession->total_amount - $landLeaseSession->total_paid;
        if ($request->amount > $need_amount) {
            return redirect()->back()->with('error', 'Amount is greater then due.');
        }
        $transactionFail = false;
        DB::beginTransaction();
        try {
            $landLeaseSession->paid_amount = $landLeaseSession->paid_amount + $request->amount;
            if ($landLeaseSession->paid_amount >= $landLeaseSession->total_amount) {
                $landLeaseSession->status = 'PAID';
            }
            if ($landLeaseSession->save()) {
                $tr_log = new TransactionLog();
                $tr_log->transaction_type = 'INCOME';
                $tr_log->amount = $request->amount;

                if ($request->payment_option == 'BANK') {
                    $tr_log->payment_method = 'BANK';
                    $tr_log->payorder = $request->pay_order_no;
                    $tr_log->bank = $request->bank_name;
                    $tr_log->branch = $request->branch_name;
                    $tr_log->account_no = $request->account_no;
                } elseif ($request->payment_option == 'BKASH') {
                    $tr_log->payment_method = 'BKASH';
                    $tr_log->transaction_number = $request->transaction_number;
                    $tr_log->transaction_id = $request->transaction_id;
                    $tr_log->reference = $request->reference;
                } elseif ($request->payment_option == 'NAGAD') {
                    $tr_log->payment_method = 'NAGAD';
                    $tr_log->transaction_number = $request->transaction_number;
                    $tr_log->transaction_id = $request->transaction_id;
                    $tr_log->reference = $request->reference;
                } elseif ($request->payment_option == 'CASH') {
                    $tr_log->payment_method = 'CASH';
                    $tr_log->receipt_no = $request->receipt_no;
                }
                $tr_log->status = 'PENDING';
                $tr_log->land_lease_session_id = $landLeaseSession->id;
                $tr_log->created_by = auth()->id();
                if (!$tr_log->save()) {
                    $transactionFail = true;
                }
            } else {
                $transactionFail = true;
            }

            if ($transactionFail) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Something went wrong');
            } else {
                DB::commit();
                return redirect()->back()->with('success', 'Payment successfully submited.');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }


        return view('admin.lease_session.make_payment', compact('landLeaseSession'));
    }
}
