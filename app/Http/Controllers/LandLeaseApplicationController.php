<?php

namespace App\Http\Controllers;

use App\Models\LandLeaseApplication;
use App\Models\LandLeaseOrder;
use Illuminate\Http\Request;

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
