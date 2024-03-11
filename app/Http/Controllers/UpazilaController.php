<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Upazila;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',

        ]);
        $query = Upazila::query();

        if ($request->search) {
            $query->where('en_name', 'LIKE', "%{$request->search}%")
                ->orWhere('bn_name', 'LIKE', "%{$request->search}%");
        }

        $datas = $query->paginate();


        return view('admin.upazila.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.upazila.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'en_name' => 'nullable|string|max:255',
            'bn_name' => 'required|string|max:255',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $data = new Upazila();
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->save();

        return redirect()->route('admin.upazila.index')->with('success', 'Upazila Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Upazila $upazila)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $upazila = Upazila::findOrFail($id);

        return view('admin.upazila.edit', compact('upazila'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'en_name' => 'nullable|string|max:255',
            'bn_name' => 'required|string|max:255',

        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $data = Upazila::find($id);
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->update();
        return redirect()->route('admin.upazila.index')->with('success', 'Upazila Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upazila $upazila)
    {
        //
    }

    public function getSubDistrictByDistrict(Request $request)
    {
        $subDistricts = Upazila::where('district_id', $request->district_id)->get()->toArray();

        return response($subDistricts);
    }
}
