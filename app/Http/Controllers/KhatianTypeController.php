<?php

namespace App\Http\Controllers;

use App\Models\KhatianType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KhatianTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
        ]);
        $query = KhatianType::query();

        if ($request->search) {
            $query->where('en_name', 'LIKE', "%{$request->search}%")
                ->orWhere('bn_name', 'LIKE', "%{$request->search}%");
        }

        $datas = $query->paginate();


        return view('admin.khatian_type.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.khatian_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'en_name' => 'nullable|string|max:255|unique:khatian_types,en_name',
            'bn_name' => 'required|string|max:255|unique:khatian_types,bn_name',

        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $data = new KhatianType();
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->save();

        return redirect()->route('admin.khatian-type.index')->with('success', 'Khatian Type Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KhatianType $khatianType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $khatianType = KhatianType::findOrFail($id);


        return view('admin.khatian_type.edit', compact('khatianType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $rules = [
            'en_name' => 'nullable|string|max:255|unique:khatian_types,en_name,' . $id,
            'bn_name' => 'required|string|max:255|unique:khatian_types,bn_name,' . $id,

        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $data =  KhatianType::findOrFail($id);
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->save();

        return redirect()->route('admin.khatian-type.index')->with('success', 'Khatian Type Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhatianType $khatianType)
    {
        //
    }
}
