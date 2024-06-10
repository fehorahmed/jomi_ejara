<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\TransactionLog;
use App\Models\Upazila;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function leasePayment(Request $request)
    {
        //  dd($request->all());
        $request->validate([
            "start_date" => 'nullable|date',
            "end_date" => 'nullable|date',
            "status" => 'nullable|string|max:255',
            "upazila" => 'nullable|numeric'

        ]);

        $query = TransactionLog::where('land_lease_session_id', '!=', null);

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->upazila) {
            $upazila = $request->upazila;
            $query->whereHas('landLeaseSession', function ($q) use ($upazila) {
                $q->whereHas('dagList', function ($a) use ($upazila) {
                    $a->where('upazila_id', $upazila);
                });
            });
        }

        if ($request->submit == "Download") {
            $results = $query->get();
            //->groupBy(['upazila_id', 'mouza_id']);

            $data = [
                'setting' => Setting::first(),
                'transactions' => $results
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

                // 'orientation' => 'L'
            ]);


            $mpdf->WriteHTML(view('admin.pdf.lease-session-payments', $data));
            ///$mpdf->Output();
            $mpdf->Output("lease-session-payments.pdf", 'I');
        }



        $transactions =  $query->get();
        $upazilas = Upazila::all();
        return view('admin.report.lease-payment', compact('transactions', 'upazilas'));
    }
}
