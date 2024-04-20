<?php

namespace App\Http\Controllers;

use App\Models\DagList;
use App\Models\LandLeaseOrder;
use Illuminate\Http\Request;

class LandLeaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = LandLeaseOrder::paginate();
        return view('admin.land_lease.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dags = DagList::where('status', 1)->get();
        return view('admin.land_lease.create', compact('dags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "dag_no" => 'required|numeric',
            "application_end_date" => "required|date",
            "status" => "required"
        ]);

        $dag_ck = LandLeaseOrder::where('dag_list_id', $request->dag_no)
            ->whereIn('status', ['PUBLISHED', 'APPLIED', 'ACCEPT'])->first();
        if ($dag_ck) {
            return redirect()->back()->withInput()->with('error', 'This dag no all ready exist in Land Lease List.');
        }

        $data = new LandLeaseOrder();
        $data->dag_list_id = $request->dag_no;
        $data->publish_date = now();
        $data->application_end_date = $request->application_end_date;
        $data->status =  $request->status;
        $data->created_by = auth()->id();
        $data->save();
        return redirect()->route('admin.land-lease.index')->with('success', 'Lease Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(LandLeaseOrder $landLeaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = LandLeaseOrder::find($id);
        $dags = DagList::where('status', 1)->get();
        return view('admin.land_lease.edit', compact('dags', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "dag_no" => 'required|numeric',
            "application_end_date" => "required|date",
            "status" => "nullable"
        ]);
        // dd($request->all());
        $data =  LandLeaseOrder::find($id);
        $data->dag_list_id = $request->dag_no;
        $data->application_end_date = $request->application_end_date;
        if ($request->status) {
            $data->status = $request->status;
        }
        $data->update();
        return redirect()->route('admin.land-lease.index')->with('success', 'Lease Order update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LandLeaseOrder $landLeaseOrder)
    {
        //
    }
}
