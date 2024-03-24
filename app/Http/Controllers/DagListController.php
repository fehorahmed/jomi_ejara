<?php

namespace App\Http\Controllers;

use App\Models\DagList;
use App\Models\EjaraRate;
use App\Models\KhatianType;
use App\Models\Mouza;
use App\Models\Upazila;
use Illuminate\Http\Request;

class DagListController extends Controller
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
        $query = DagList::query();

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
        if ($request->search_khatian_no) {
            $query->where('khatian_list_id', $request->search_khatian_no);
        }

        if ($request->submit == "Download") {
            $results = $query->orderBy('upazila_id')->get()
                ->groupBy(['upazila_id', 'mouza_id']);
            //dd($results); //mouza_id
            $myArray = [];
            foreach ($results as $upazila_key => $mouzas) {
                //dd($items);
                foreach ($mouzas as $mouza_key => $dags) {
                    foreach ($dags as $item) {
                        $myArray[$upazila_key][$mouza_key][$item->khatianType->bn_name][] = $item;
                    }
                    ksort($myArray[$upazila_key]);
                }
                // ksort($myArray[$key]);
            }
            $finalArr = [];

            foreach ($myArray as $final_upazila_key => $upazila) {
                foreach ($upazila as $key2 => $mouzas2) {
                    $countArr = [];
                    $countArr['CS'] = isset($mouzas2['CS']) ? count($mouzas2['CS']) : 0;
                    $countArr['SA'] = isset($mouzas2['SA']) ? count($mouzas2['SA']) : 0;
                    $countArr['RS'] = isset($mouzas2['RS']) ? count($mouzas2['RS']) : 0;
                    $countArr['BRS'] = isset($mouzas2['BRS']) ? count($mouzas2['BRS']) : 0;

                    $countMax = max($countArr);
                    for ($i = 1; $i <= 3; $i++) {
                        if (isset($mouzas2['CS'])) {
                            for ($j = 0; $j < $countMax; $j++) {
                                if (isset($mouzas2['CS'][$j])) {
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_khotian_no'] = $mouzas2['CS'][$j]->khatianNo->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_dag_no'] = $mouzas2['CS'][$j]->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_land_condition'] = $mouzas2['CS'][$j]->land_condition;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_land_amount'] = $mouzas2['CS'][$j]->land_amount;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_land_amount_type'] = $mouzas2['CS'][$j]->land_amount_type;
                                } else {
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_khotian_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_dag_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_land_condition'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_land_amount'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['cs_land_amount_type'] = null;
                                }
                            }
                        } else {
                            for ($j = 0; $j < $countMax; $j++) {
                                $finalArr[$final_upazila_key][$key2][$j]['cs_khotian_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['cs_dag_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['cs_land_condition'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['cs_land_amount'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['cs_land_amount_type'] = null;
                            }
                        }
                        if (isset($mouzas2['SA'])) {
                            for ($j = 0; $j < $countMax; $j++) {

                                if (isset($mouzas2['SA'][$j])) {

                                    $finalArr[$final_upazila_key][$key2][$j]['sa_khotian_no'] = $mouzas2['SA'][$j]->khatianNo->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_dag_no'] = $mouzas2['SA'][$j]->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_land_condition'] = $mouzas2['SA'][$j]->land_condition;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_land_amount'] = $mouzas2['SA'][$j]->land_amount;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_land_amount_type'] = $mouzas2['SA'][$j]->land_amount_type;
                                } else {

                                    $finalArr[$final_upazila_key][$key2][$j]['sa_khotian_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_dag_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_land_condition'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_land_amount'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['sa_land_amount_type'] = null;
                                }
                            }
                        } else {
                            for ($j = 0; $j < $countMax; $j++) {
                                $finalArr[$final_upazila_key][$key2][$j]['sa_khotian_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['sa_dag_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['sa_land_condition'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['sa_land_amount'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['sa_land_amount_type'] = null;
                            }
                        }
                        if (isset($mouzas2['RS'])) {
                            for ($j = 0; $j < $countMax; $j++) {

                                if (isset($mouzas2['RS'][$j])) {

                                    $finalArr[$final_upazila_key][$key2][$j]['rs_khotian_no'] = $mouzas2['RS'][$j]->khatianNo->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_dag_no'] = $mouzas2['RS'][$j]->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_land_condition'] = $mouzas2['RS'][$j]->land_condition;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_land_amount'] = $mouzas2['RS'][$j]->land_amount;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_land_amount_type'] = $mouzas2['RS'][$j]->land_amount_type;
                                } else {
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_khotian_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_dag_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_land_condition'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_land_amount'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['rs_land_amount_type'] = null;
                                }
                            }
                        } else {
                            for ($j = 0; $j < $countMax; $j++) {
                                $finalArr[$final_upazila_key][$key2][$j]['rs_khotian_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['rs_dag_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['rs_land_condition'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['rs_land_amount'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['rs_land_amount_type'] = null;
                            }
                        }
                        if (isset($mouzas2['BRS'])) {
                            for ($j = 0; $j < $countMax; $j++) {

                                if (isset($mouzas2['BRS'][$j])) {

                                    $finalArr[$final_upazila_key][$key2][$j]['brs_khotian_no'] = $mouzas2['BRS'][$j]->khatianNo->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_dag_no'] = $mouzas2['BRS'][$j]->bn_name;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_land_condition'] = $mouzas2['BRS'][$j]->land_condition;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_land_amount'] = $mouzas2['BRS'][$j]->land_amount;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_land_amount_type'] = $mouzas2['BRS'][$j]->land_amount_type;
                                } else {
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_khotian_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_dag_no'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_land_condition'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_land_amount'] = null;
                                    $finalArr[$final_upazila_key][$key2][$j]['brs_land_amount_type'] = null;
                                }
                            }
                        } else {
                            for ($j = 0; $j < $countMax; $j++) {
                                $finalArr[$final_upazila_key][$key2][$j]['brs_khotian_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['brs_dag_no'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['brs_land_condition'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['brs_land_amount'] = null;
                                $finalArr[$final_upazila_key][$key2][$j]['brs_land_amount_type'] = null;
                            }
                        }
                    }
                }


                // dd($myArray);
            }


            $data = [
                // 'divisions' => Division::all(),
                'setting' => null,
                'datas' => $finalArr
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

            $mpdf->WriteHTML(view('admin.dag_list.report2', $data));
            ///$mpdf->Output();
            $mpdf->Output("dag_list.pdf", 'I');
        }


        $datas = $query->paginate();
        $khatianTypes = KhatianType::all();
        $upazilas = Upazila::all();

        return view('admin.dag_list.index', compact('datas', 'khatianTypes', 'upazilas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $upazilas = Upazila::all();
        $ejara_rates = EjaraRate::where('status', 1)->get();
        $khatianTypes = KhatianType::where('status', 1)->get();


        return view('admin.dag_list.create', compact('upazilas', 'khatianTypes', 'ejara_rates'));
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
            "khatian_no" => 'required|numeric',
            "ejara_rate" => 'required|numeric',
            "bn_name" => 'required|string|max:255',
            "land_amount" => 'required|numeric',
            "land_amount_type" => 'required|numeric',
            "owner_hisar_part" => 'required|numeric',
            "occupied_land" => 'required|numeric',
            "unoccupied_land" => 'required|numeric',
            "land_condition" => 'required|string|max:255',
            "remarks" => 'required|string|max:255',
        ]);
        // dd($request->all());

        $data = new DagList();
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->owner_hisar_part = $request->owner_hisar_part;
        $data->occupied_land = $request->occupied_land;
        $data->unoccupied_land = $request->unoccupied_land;
        $data->land_condition = $request->land_condition;
        $data->remarks = $request->remarks;
        $data->land_amount = $request->land_amount;
        $data->land_amount_type = $request->land_amount_type;
        $data->upazila_id = $request->upazila;
        $data->union_pourashava_id = $request->union_pourashava;
        $data->khatian_type_id = $request->khatian_type;
        $data->mouza_id = $request->mouza;
        $data->khatian_list_id = $request->khatian_no;
        $data->ejara_rate_id = $request->ejara_rate;
        $data->status = 1;
        $data->save();
        return redirect()->route('admin.dag-list.index')->with('success', 'Dag no successfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(DagList $dagList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $upazilas = Upazila::all();
        $khatianTypes = KhatianType::where('status', 1)->get();
        $ejara_rates = EjaraRate::all();
        $dagList = DagList::findOrFail($id);

        return view('admin.dag_list.edit', compact('upazilas', 'khatianTypes', 'ejara_rates', 'dagList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "upazila" => 'required|numeric',
            "union_pourashava" => 'required|numeric',
            "khatian_type" => 'required|numeric',
            "mouza" => 'required|numeric',
            "khatian_no" => 'required|numeric',
            "ejara_rate" => 'required|numeric',
            "bn_name" => 'required|string|max:255',
            "land_amount" => 'required|numeric',
            "land_amount_type" => 'required|numeric',
            "owner_hisar_part" => 'required|numeric',
            "occupied_land" => 'required|numeric',
            "unoccupied_land" => 'required|numeric',
            "land_condition" => 'required|string|max:255',
            "remarks" => 'required|string|max:255',
        ]);
        // dd($request->all());

        $data =  DagList::find($id);
        $data->en_name = $request->en_name;
        $data->bn_name = $request->bn_name;
        $data->owner_hisar_part = $request->owner_hisar_part;
        $data->occupied_land = $request->occupied_land;
        $data->unoccupied_land = $request->unoccupied_land;
        $data->land_condition = $request->land_condition;
        $data->remarks = $request->remarks;
        $data->land_amount = $request->land_amount;
        $data->land_amount_type = $request->land_amount_type;
        $data->upazila_id = $request->upazila;
        $data->union_pourashava_id = $request->union_pourashava;
        $data->khatian_type_id = $request->khatian_type;
        $data->mouza_id = $request->mouza;
        $data->khatian_list_id = $request->khatian_no;
        $data->ejara_rate_id = $request->ejara_rate;
        $data->status = 1;
        $data->save();
        return redirect()->route('admin.dag-list.index')->with('success', 'Dag no successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DagList $dagList)
    {
        //
    }
    public function view($id)
    {
        $dag = DagList::findOrFail($id);
        return view('admin.dag_list.view', compact('dag'));
    }
}
