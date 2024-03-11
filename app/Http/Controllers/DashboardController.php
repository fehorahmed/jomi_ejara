<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['total_admin'] = User::count();


        return view('admin.dashboard')->with($data);
    }
}
