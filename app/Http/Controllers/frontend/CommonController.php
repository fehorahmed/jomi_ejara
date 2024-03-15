<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller
{

    public function my_account()
    {

        $user = Auth::user();

        $settings= Setting::first();
        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);

        return view('frontend.common.my_account')
            ->with([
                'user' => $user,
                'settings' => $settings,
                // 'posts' => $posts,
                // 'widgets' => $widgets
            ]);
    }
}
