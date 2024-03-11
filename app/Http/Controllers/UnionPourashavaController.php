<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\UnionPourashava;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnionPourashavaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'upazila' => 'nullable|numeric',
        ]);
        $query = UnionPourashava::query();

        if ($request->search) {
            $query->where('en_name', 'LIKE', "%{$request->search}%")
                ->orWhere('bn_name', 'LIKE', "%{$request->search}%");
        }

        if ($request->upazila) {
            $query->where('upazila_id', $request->upazila);
        }
        $datas = $query->paginate();
        $upazilas = Upazila::all();

        return view('admin.union_pourashava.index', compact('datas', 'upazilas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $upazilas = Upazila::where('status', 1)->get();
        return view('admin.union_pourashava.create', compact('upazilas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'en_name' => 'nullable|string|max:255',
            'bn_name' => 'required|string|max:255',
            'upazila' => 'required|numeric',
            'type' => 'required|numeric',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $data = new UnionPourashava();
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->upazila_id = $request->upazila;
        $data->is_pourashava = $request->type;
        $data->save();

        return redirect()->route('admin.union-pourashava.index')->with('success', 'Union/Pourashava Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnionPourashava $unionPourashava)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unionPourashava = UnionPourashava::findOrFail($id);
        $upazilas = Upazila::where('status', 1)->get();
        return view('admin.union_pourashava.edit', compact('unionPourashava', 'upazilas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'en_name' => 'nullable|string|max:255',
            'bn_name' => 'required|string|max:255',
            'upazila' => 'required|numeric',
            'type' => 'required|numeric',
            'status' => 'required|boolean',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $data =  UnionPourashava::find($id);
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->upazila_id = $request->upazila;
        $data->is_pourashava = $request->type;
        $data->status = $request->status;
        $data->update();

        return redirect()->route('admin.union-pourashava.index')->with('success', 'Union/Pourashava Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnionPourashava $unionPourashava)
    {
        //
    }
    public function getUnionBySubDistrict(Request $request)
    {
        $subDistricts = UnionPourashava::where('upazila_id', $request->upazila_id)->get()->toArray();

        return response($subDistricts);
    }
}
