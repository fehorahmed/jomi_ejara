<?php

namespace App\Http\Controllers;

use App\Models\LandLease;
use App\Models\LandLeaseApplication;
use App\Models\LandLeaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LandLeaseApplicationController extends Controller
{

    public function landLeaseApplicationStore(Request $request, $land_lease_order_id)
    {

        $request->validate([
            "payment_method" => 'required|string',
            "amount" => 'required|numeric',
            "payorder" => 'nullable|string|required_if:payment_method,Bank draft',
            "bank" => 'nullable|string|required_if:payment_method,Bank draft',
            "branch" => 'nullable|string|required_if:payment_method,Bank draft',
            "number" => 'nullable|string|required_if:payment_method,Bkash|required_if:payment_method,Nagad',
            "transaction_id" => 'nullable|string|required_if:payment_method,Bkash|required_if:payment_method,Nagad',
            "receipt_no" => 'nullable|string|required_if:payment_method,Cash',
            "date" => 'required|date',
        ]);

        $ck_lease_order = LandLeaseOrder::findOrFail($land_lease_order_id);
        if ($ck_lease_order->status != 'PUBLISHED') {
            return redirect()->back()->with('error', 'Application is not available.');
        }
        $ck_land_app = LandLeaseApplication::where(['land_lease_order_id' => $ck_lease_order, 'user_id' => auth()->id()])->first();
        if ($ck_land_app) {
            return redirect()->back()->with('error', 'All ready applied.');
        }

        $new_application = new LandLeaseApplication();
        $new_application->land_lease_order_id = $ck_lease_order->id;
        $new_application->dag_list_id = $ck_lease_order->dag_list_id;
        $new_application->user_id = auth()->id();
        $new_application->date = now();
        $new_application->payment_date = $request->date;
        $new_application->amount = $request->amount;
        if ($request->payment_method == 'Bank draft') {
            $new_application->payment_method = 'BANK';
            $new_application->payorder = $request->payorder;
            $new_application->bank = $request->bank;
            $new_application->branch = $request->branch;
        } elseif ($request->payment_method == 'Bkash') {
            $new_application->payment_method = 'BKASH';
            $new_application->transaction_number = $request->number;
            $new_application->transaction_id = $request->transaction_id;
        } elseif ($request->payment_method == 'Nagad') {
            $new_application->payment_method = 'NAGAD';
            $new_application->transaction_number = $request->number;
            $new_application->transaction_id = $request->transaction_id;
        } elseif ($request->payment_method == 'Cash') {
            $new_application->payment_method = 'CASH';
            $new_application->receipt_no = $request->receipt_no;
        }
        $new_application->status = 'APPLIED';
        if ($new_application->save()) {
            return redirect()->back()->with('success', 'Application successfully added.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index(Request $request)
    {
        $datas = LandLeaseApplication::orderBy('id', 'DESC')->paginate(15);
        return view('admin.land_lease_application.index', compact('datas'));
    }


    public function leaseApplicationAccept(Request $request)
    {
        // dd($request->all());
        $rules = [
            'lease_application_id' => 'required|numeric',
        ];

        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validation->errors()->first()
            ]);
        }

        $transactionFail = false;
        DB::beginTransaction();
        try {
            $data = LandLeaseApplication::find($request->lease_application_id);
            $data->accept_by = auth()->id();
            $data->status = 'ACCEPT';
            if ($data->save()) {
                $lease_order = LandLeaseOrder::find($data->land_lease_order_id);
                $lease_order->status = 'ACCEPT';
                if ($lease_order->save()) {
                    $land_lease = new LandLease();
                    $land_lease->user_id = $data->user_id;
                    $land_lease->dag_list_id = $lease_order->dag_list_id;
                    $land_lease->land_lease_application_id = $data->id;
                    $land_lease->created_by = auth()->id();
                    $land_lease->status = 'ACTIVE';
                    if (!$land_lease->save()) {
                        $transactionFail = true;
                    }
                } else {
                    $transactionFail = true;
                }
            } else {
                $transactionFail = true;
            }

            if ($transactionFail == true) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong',
                ]);
            } else {
                DB::commit();
                return response()->json([
                    'status' => true,
                    'message' => 'Successfully added.',
                ]);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LandLeaseApplication $landLeaseApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LandLeaseApplication $landLeaseApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LandLeaseApplication $landLeaseApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandLeaseApplication $landLeaseApplication)
    {
        //
    }
}
