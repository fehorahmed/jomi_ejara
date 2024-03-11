<?php

namespace App\Http\Controllers;

use App\Models\KhatianList;
use App\Models\KhatianType;
use App\Models\Mouza;
use App\Models\Upazila;
use Illuminate\Http\Request;

class KhatianListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'mouza' => 'nullable|numeric',
        ]);
        $query = KhatianList::query();

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
        if ($request->search_mouza) {
            $query->where('mouza_id', $request->search_mouza);
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

            $mpdf->WriteHTML(view('admin.khatian_list.report', $data));
            ///$mpdf->Output();
            $mpdf->Output("khatian_list.pdf", 'I');
        }



        $datas = $query->paginate();

        $upazilas = Upazila::all();
        $khatianTypes = KhatianType::all();

        return view('admin.khatian_list.index', compact('datas', 'upazilas','khatianTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $upazilas = Upazila::where('status', 1)->get();
        $khatianTypes = KhatianType::where('status', 1)->get();

        return view('admin.khatian_list.create', compact('upazilas', 'khatianTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "upazila" => 'required|numeric',
            "union_pourashava" => 'required|numeric',
            "khatian_type" => 'required|numeric',
            "mouza" => 'required|numeric',
            "bn_name" => 'required|string|max:255',
            "en_name" => 'nullable|string|max:255',
            "owner_name" => 'nullable|string|max:255',
        ]);

        $data = new KhatianList();
        $data->bn_name = $request->bn_name;
        $data->en_name = $request->en_name;
        $data->owner_name = $request->owner_name;
        $data->upazila_id = $request->upazila;
        $data->union_pourashava_id = $request->union_pourashava;
        $data->khatian_type_id = $request->khatian_type;
        $data->mouza_id = $request->mouza;
        $data->status = 1;
        $data->save();

        return redirect()->route('admin.khatian-list.index')->with('success', 'Khatian no successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(KhatianList $khatianList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $upazilas = Upazila::where('status', 1)->get();
        $khatianTypes = KhatianType::where('status', 1)->get();
        $khatianList = KhatianList::findOrFail($id);
        return view('admin.khatian_list.edit', compact('upazilas', 'khatianTypes', 'khatianList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            "upazila" => 'required|numeric',
            "union_pourashava" => 'required|numeric',
            "khatian_type" => 'required|numeric',
            "mouza" => 'required|numeric',
            "bn_name" => 'required|string|max:255',
            "en_name" => 'nullable|string|max:255',
            "owner_name" => 'nullable|string|max:255',
            "status" => 'required|boolean',
        ]);

        $data =  KhatianList::findOrFail($id);
        $data->bn_name = $request->bn_name;
        $data->en_name = $request->en_name;
        $data->owner_name = $request->owner_name;
        $data->upazila_id = $request->upazila;
        $data->union_pourashava_id = $request->union_pourashava;
        $data->khatian_type_id = $request->khatian_type;
        $data->mouza_id = $request->mouza;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('admin.khatian-list.index')->with('success', 'Khatian no successfully added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhatianList $khatianList)
    {
        //
    }


    public function getKhatiyanNoByMouza(Request $request)
    {

        $subDistricts = KhatianList::where([
            'mouza_id' => $request->mouza_id,
            'upazila_id' => $request->upazila_id,
            'khatian_type_id' => $request->khatian_type_id,
            'union_pourashava_id' => $request->union_pourashava_id,
        ])
            ->get()->toArray();
        //dd($subDistricts);
        return response($subDistricts);
    }
}
