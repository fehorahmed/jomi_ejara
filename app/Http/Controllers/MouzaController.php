<?php

namespace App\Http\Controllers;

use App\Models\KhatianType;
use App\Models\Mouza;
use App\Models\Upazila;
use Illuminate\Http\Request;

class MouzaController extends Controller
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
        $query = Mouza::query();

        if ($request->search) {
            $query->where('en_name', 'LIKE', "%{$request->search}%")
                ->orWhere('bn_name', 'LIKE', "%{$request->search}%");
        }

        if ($request->search_upazila) {
            $query->where('upazila_id', $request->search_upazila);
        }
        if ($request->search_union_pourashava) {
            $query->where('union_pourashava_id', $request->search_union_pourashava);
        }
        if ($request->search_khatian_type) {
            $query->where('khatian_type_id', $request->search_khatian_type);
        }


        if ($request->submit == "Download") {
            $datas = $query->get();

            $data = [
                // 'divisions' => Division::all(),
                'setting' => null,
                'datas' => $datas
            ];
            $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
            $fontDirs = $defaultConfig['fontDir'];

            $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
            $fontData = $defaultFontConfig['fontdata'];

            $mpdf = new \Mpdf\Mpdf([
                'fontDir' => array_merge($fontDirs, [
                    public_path('fonts'),
                ]),
                'fontdata' => $fontData + [ // lowercase letters only in font key
                    'solaimanlipi' => [
                        'R' => 'SolaimanLipi12.ttf',
                        'useOTL' => 0xFF,
                    ]
                ],
                'default_font' => 'solaimanlipi',
                'mode' => 'utf-8',

                'orientation' => 'L'
            ]);

            $mpdf->WriteHTML(view('admin.mouza.report', $data));
            ///$mpdf->Output();
            $mpdf->Output("mouza_list.pdf", 'I');
        }



        $datas = $query->paginate();
        $khatianTypes = KhatianType::all();
        $upazilas = Upazila::all();

        return view('admin.mouza.index', compact('datas', 'khatianTypes','upazilas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $upazilas = Upazila::where('status', 1)->get();
        $khatianTypes = KhatianType::where('status', 1)->get();
        return view('admin.mouza.create', compact('khatianTypes', 'upazilas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "khatian_type" => 'required|numeric',
            "union_pourashava" => 'required|numeric',
            "upazila" => 'required|numeric',
            "bn_name" => 'required|string|max:255',
            'en_name' => 'nullable|string|max:255',
            'j_l_no' => 'nullable|string|max:255',
        ]);

        $data = new Mouza();
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->j_l_no = $request->j_l_no;
        $data->khatian_type_id = $request->khatian_type;
        $data->upazila_id = $request->upazila;
        $data->union_pourashava_id = $request->union_pourashava;
        $data->status = 1;
        $data->save();
        return redirect()->route('admin.mouza.index')->with('success', 'Mouza successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mouza $mouza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mouza = Mouza::findOrFail($id);
        $upazilas = Upazila::all();
        $khatianTypes = KhatianType::where('status', 1)->get();
        return view('admin.mouza.edit', compact('khatianTypes', 'upazilas', 'mouza'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            "khatian_type" => 'required|numeric',
            "union_pourashava" => 'required|numeric',
            "upazila" => 'required|numeric',
            "bn_name" => 'required|string|max:255',
            'en_name' => 'nullable|string|max:255',
            'j_l_no' => 'nullable|string|max:255',
        ]);

        $data =  Mouza::findOrFail($id);
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->j_l_no = $request->j_l_no;
        $data->khatian_type_id = $request->khatian_type;
        $data->upazila_id = $request->upazila;
        $data->union_pourashava_id = $request->union_pourashava;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('admin.mouza.index')->with('success', 'Mouza successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mouza $mouza)
    {
        //
    }

    public function getMouzaByKhatianType(Request $request)
    {

        $subDistricts = Mouza::where([
            'upazila_id' => $request->upazila_id,
            'khatian_type_id' => $request->khatian_type_id,
            'union_pourashava_id' => $request->union_pourashava_id,
        ])
            ->get()->toArray();
        //dd($subDistricts);
        return response($subDistricts);
    }
}
