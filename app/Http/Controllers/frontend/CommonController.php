<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandLease;
use App\Models\LandLeaseApplication;
use App\Models\LandLeaseOrder;
use App\Models\LandLeaseSession;
use App\Models\Setting;
use App\Models\TransactionLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CommonController extends Controller
{

    public function my_account()
    {

        $user = Auth::user();

        $settings = Setting::first();
        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);
        $leaseOrders = LandLeaseOrder::where('status', 'PUBLISHED')->orderBy('id', 'DESC')->get();
        $leaseApplications = LandLeaseApplication::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        $my_lands = LandLease::where('user_id', auth()->id())->get();
        return view('frontend.common.my_account')
            ->with([
                'user' => $user,
                'settings' => $settings,
                'leaseOrders' => $leaseOrders,
                'leaseApplications' => $leaseApplications,
                'my_lands' => $my_lands
            ]);
    }
    public function landDetails($land_lease_id)
    {
        $land_lease = LandLease::where(['id' => $land_lease_id, 'user_id' => auth()->id()])->first();
        if (!$land_lease) {
            return redirect()->back('error', 'You are not authorized.');
        }
        $user = Auth::user();
        $lease_sessions = LandLeaseSession::where(['dag_list_id' => $land_lease->dag_list_id, 'user_id' => $user->id])->get();
        // dd($lease_sessions);
        $settings = Setting::first();

        $leaseOrders = LandLeaseOrder::where('status', 'PUBLISHED')->orderBy('id', 'DESC')->get();
        $leaseApplications = LandLeaseApplication::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();
        $my_lands = LandLease::where('user_id', auth()->id())->get();
        return view('frontend.service.land_lease.my_land')
            ->with([
                'user' => $user,
                'settings' => $settings,
                'leaseOrders' => $leaseOrders,
                'leaseApplications' => $leaseApplications,
                'my_lands' => $my_lands,
                'land_lease' => $land_lease,
                'lease_sessions' => $lease_sessions

            ]);
    }

    public function profile_edit()
    {

        $user = Auth::user();

        $settings = Setting::first();
        $divisions = Division::all();
        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);

        return view('frontend.common.profile_edit')
            ->with([
                'user' => $user,
                'settings' => $settings,
                'divisions' => $divisions,
                // 'posts' => $posts,
                // 'widgets' => $widgets
            ]);
    }
    public function profile_edit_update(Request $request)
    {

        $request->validate([
            "profile_id" => 'required|numeric',
            "name" => 'required|string|max:255',
            "phone" => 'required|string|unique:users,phone,' . auth()->id(),
            "email" => 'email|required|max:255|unique:users,email,' . auth()->id(),
            "father_name" => 'required|string|max:255',
            "mother_name" => 'required|string|max:255',
            "nidno" => 'required|string|max:255|unique:users,nidno,' . auth()->id(),
            "passportno" => 'nullable|string|max:255',
            "birthcertificateno" => 'nullable|string|max:255',
            "gender" => 'required|string|max:255',
            "religion" => 'required|string|max:255',
            "marital_status" => 'required|string|max:255',
            "birthday" => 'required|date',
            // "monthly_income" => 'required|numeric',
            // "yearly_income" => 'required|numeric',
            "profession" => 'required|string|max:255',
            "freedomfighters" => 'required|numeric',
            "present_division" => 'required|numeric',
            "present_district" => 'required|numeric',
            "present_upazila" => 'required|numeric',
            "present_postoffice" => 'required|string|max:255',
            "present_village" => 'required|string|max:255',
            "present_address" => 'required|string|max:255',
            "permanent_division" => 'required|numeric',
            "permanent_district" => 'required|numeric',
            "permanent_upazila" => 'required|numeric',
            "permanent_postoffice" => 'required|string|max:255',
            "permanent_village" => 'required|string|max:255',
            "permanent_address" => 'required|string|max:255',
            "photo" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();

        $data = User::find($user->id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->nidno = $request->nidno;
        $data->passportno = $request->passportno;
        $data->birthcertificateno = $request->birthcertificateno;
        $data->gender = $request->gender;
        $data->religion = $request->religion;
        $data->marital_status = $request->marital_status;
        $data->birthday = $request->birthday;
        // $data->monthly_income = $request->monthly_income;
        //  $data->yearly_income = $request->yearly_income;
        $data->profession = $request->profession;
        $data->freedomfighters = $request->freedomfighters;
        $data->present_division = $request->present_division;
        $data->present_district = $request->present_district;
        $data->present_upazila = $request->present_upazila;
        $data->present_postoffice = $request->present_postoffice;
        $data->present_village = $request->present_village;
        $data->present_address = $request->present_address;
        $data->permanent_division = $request->permanent_division;
        $data->permanent_district = $request->permanent_district;
        $data->permanent_upazila = $request->permanent_upazila;
        $data->permanent_postoffice = $request->permanent_postoffice;
        $data->permanent_village = $request->permanent_village;
        $data->permanent_address = $request->permanent_address;

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
            $image = $request->file('photo');
            $filename = time() . '_' . $image->getClientOriginalName();
            //dfgdfg
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!Storage::exists('public/profile')) {
                Storage::makeDirectory('public/profile');
            }
            $path = public_path('storage/profile/' . $filename); // Set the desired storage path
            $imgFile->save($path); // Save the resized image
            $data->photo = 'profile/' . $filename; // Store the image path in your data model or database
        }
        $data->save();

        return redirect()->back()->with('success', 'Profile successfully updated.');



        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);


    }


    public function landSessionPayment($land_lease_session_id)
    {
        $lease_session = LandLeaseSession::where(['id' => $land_lease_session_id, 'user_id' => auth()->id()])->first();
        if (!$lease_session) {
            return redirect()->back('error', 'You are not authorized.');
        }
        $user = Auth::user();
        $settings = Setting::first();
        return view('frontend.service.land_lease.land_session_payment')
            ->with([
                'user' => $user,
                'settings' => $settings,
                'lease_session' => $lease_session

            ]);
    }
    public function landSessionPaymentStore(Request $request, $land_lease_session_id)
    {
        $request->validate([
            "payment_option" => 'required|string',
            "amount" => 'required|numeric|min:1',
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
        $landLeaseSession = LandLeaseSession::findOrFail($land_lease_session_id);

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


        // return view('admin.lease_session.make_payment', compact('landLeaseSession'));
    }

    public function landSessionPaymentDetails($land_lease_session_id)
    {
        $land_session = LandLeaseSession::where(['id' => $land_lease_session_id, 'user_id' => auth()->id()])->first();
        if (!$land_session) {
            return redirect()->back()->with('error', 'You are not authorized.');
        }
        $tr_logs = TransactionLog::where('land_lease_session_id', $land_session->id)->orderBy('id', 'DESC')->get();
        return view('frontend.service.land_lease.land_session_payment_details')
            ->with([
                'tr_logs' => $tr_logs,
                'lease_session' => $land_session
            ]);
    }
}
