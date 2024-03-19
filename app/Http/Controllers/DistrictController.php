<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{

    public function getDistrictByDivision(Request $request)
    {
        $district = District::where('division_id', $request->division_id)->get()->toArray();
        return response($district);
    }
}
