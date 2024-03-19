<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_admin'] = User::where('is_admin', 1)->count();
        $data['total_user'] = User::where('is_admin', null)->count();


        return view('admin.dashboard')->with($data);
    }
}
