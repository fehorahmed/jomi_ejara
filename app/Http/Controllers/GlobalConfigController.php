<?php

namespace App\Http\Controllers;

use App\Models\GlobalConfig;
use Illuminate\Http\Request;

class GlobalConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.global_config');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lease_duration' => 'required|numeric',
            'due_fine' => 'required|numeric|min:0|max:100',
            'new_form_fee' => 'required|numeric',
            'renew_form_fee' => 'required|numeric',
            // 'transfer_fee' => 'required|numeric',
            // 'transfer_form_fee' => 'required|numeric',
            'vat' => 'required|numeric|min:0|max:100',
            'tax' => 'required|numeric|min:0|max:100',
            'bank_charge' => 'required|numeric|min:0|max:100',
            'bkash_charge' => 'required|numeric|min:0|max:100',
            'nagad_charge' => 'required|numeric|min:0|max:100',

        ]);
        $request->request->remove('_token');
        foreach ($request->all() as $key => $value) {
            $this->configUpdate($key, $value);
        }
        return redirect()->back()->with('success', 'Configuration update successfully.');
    }
    /**
     * @param $key
     * @param $value
     *
     * @return bool
     */
    private function configUpdate($key, $value)
    {
        $config = GlobalConfig::where('key', $key)->first();

        if ($config != NULL) {
            $config->value = is_array($value) ? implode(',', $value) : $value;

            return $config->save();
        } else {
            $config = new GlobalConfig();

            $config->key = $key;

            $config->value = is_array($value) ? implode(',', $value) : $value;

            return $config->save();
        }
    }
}
