<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\HomePerson;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $people = HomePerson::limit(2)->get();
        // dd($people);
        return view('frontend.home', compact('people'));
    }
}
