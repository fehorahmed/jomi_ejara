<?php

namespace App\Http\Controllers;

use App\Models\EjaraRate;
use Illuminate\Http\Request;

class EjaraRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',

        ]);
        $query = EjaraRate::query();
        if ($request->search) {
            $query->where('en_name', 'LIKE', "%{$request->search}%")
                ->orWhere('bn_name', 'LIKE', "%{$request->search}%");
        }

        $datas = $query->paginate();
        return view('admin.ejara_rate.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ejara_rate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bn_name' => 'required|string|max:255|unique:ejara_rates,bn_name',
            'en_name' => 'nullable|string|max:255|unique:ejara_rates,en_name',
            'land_amount_type' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $data = new EjaraRate();
        $data->bn_name = $request->bn_name;
        $data->en_name = $request->en_name;
        $data->amount = $request->amount;
        // 1= borgofoot, 2 = satak
        $data->land_amount_type = $request->land_amount_type;
        $data->status = 1;
        $data->save();
        return redirect()->route('admin.ejara-rate.index')->with('success', 'Ejara Rate Successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EjaraRate $ejaraRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ejara_rate =  EjaraRate::find($id);
        return view('admin.ejara_rate.edit', compact('ejara_rate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bn_name' => 'required|string|max:255|unique:ejara_rates,bn_name,' . $id,
            'en_name' => 'nullable|string|max:255|unique:ejara_rates,en_name',
            'land_amount_type' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $data = EjaraRate::find($id);
        $data->bn_name = $request->bn_name;
        $data->en_name = $request->en_name;
        $data->amount = $request->amount;
        $data->land_amount_type = $request->land_amount_type;
        //  $data->status= 1;
        $data->save();
        return redirect()->route('admin.ejara-rate.index')->with('success', 'Ejara Rate Successfully added.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EjaraRate $ejaraRate)
    {
        //
    }
}
