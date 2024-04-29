<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\LandLeaseApplication;
use App\Models\LandLeaseOrder;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CommonController extends Controller
{

    public function my_account()
    {

        $user = Auth::user();

        $settings = Setting::first();
        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);
        $leaseOrders = LandLeaseOrder::where('status', 'PUBLISHED')->orderBy('id', 'DESC')->get();
        $leaseApplications = LandLeaseApplication::where('user_id', auth()->id())->orderBy('id', 'DESC')->get();

        return view('frontend.common.my_account')
            ->with([
                'user' => $user,
                'settings' => $settings,
                'leaseOrders' => $leaseOrders,
                'leaseApplications' => $leaseApplications,
                // 'widgets' => $widgets
            ]);
    }
    public function profile_edit()
    {

        $user = Auth::user();

        $settings = Setting::first();
        $divisions = Division::all();
        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);

        return view('frontend.common.profile_edit')
            ->with([
                'user' => $user,
                'settings' => $settings,
                'divisions' => $divisions,
                // 'posts' => $posts,
                // 'widgets' => $widgets
            ]);
    }
    public function profile_edit_update(Request $request)
    {

        $request->validate([
            "profile_id" => 'required|numeric',
            "name" => 'required|string|max:255',
            "phone" => 'required|string|unique:users,phone,' . auth()->id(),
            "email" => 'email|required|max:255|unique:users,email,' . auth()->id(),
            "father_name" => 'required|string|max:255',
            "mother_name" => 'required|string|max:255',
            "nidno" => 'required|string|max:255|unique:users,nidno,' . auth()->id(),
            "passportno" => 'nullable|string|max:255',
            "birthcertificateno" => 'nullable|string|max:255',
            "gender" => 'required|string|max:255',
            "religion" => 'required|string|max:255',
            "marital_status" => 'required|string|max:255',
            "birthday" => 'required|date',
            // "monthly_income" => 'required|numeric',
            // "yearly_income" => 'required|numeric',
            "profession" => 'required|string|max:255',
            "freedomfighters" => 'required|numeric',
            "present_division" => 'required|numeric',
            "present_district" => 'required|numeric',
            "present_upazila" => 'required|numeric',
            "present_postoffice" => 'required|string|max:255',
            "present_village" => 'required|string|max:255',
            "present_address" => 'required|string|max:255',
            "permanent_division" => 'required|numeric',
            "permanent_district" => 'required|numeric',
            "permanent_upazila" => 'required|numeric',
            "permanent_postoffice" => 'required|string|max:255',
            "permanent_village" => 'required|string|max:255',
            "permanent_address" => 'required|string|max:255',
            "photo" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();

        $data = User::find($user->id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->nidno = $request->nidno;
        $data->passportno = $request->passportno;
        $data->birthcertificateno = $request->birthcertificateno;
        $data->gender = $request->gender;
        $data->religion = $request->religion;
        $data->marital_status = $request->marital_status;
        $data->birthday = $request->birthday;
        // $data->monthly_income = $request->monthly_income;
        //  $data->yearly_income = $request->yearly_income;
        $data->profession = $request->profession;
        $data->freedomfighters = $request->freedomfighters;
        $data->present_division = $request->present_division;
        $data->present_district = $request->present_district;
        $data->present_upazila = $request->present_upazila;
        $data->present_postoffice = $request->present_postoffice;
        $data->present_village = $request->present_village;
        $data->present_address = $request->present_address;
        $data->permanent_division = $request->permanent_division;
        $data->permanent_district = $request->permanent_district;
        $data->permanent_upazila = $request->permanent_upazila;
        $data->permanent_postoffice = $request->permanent_postoffice;
        $data->permanent_village = $request->permanent_village;
        $data->permanent_address = $request->permanent_address;

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::delete('public/' . $user->photo);
            }
            $image = $request->file('photo');
            $filename = time() . '_' . $image->getClientOriginalName();
            //dfgdfg
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!Storage::exists('public/profile')) {
                Storage::makeDirectory('public/profile');
            }
            $path = public_path('storage/profile/' . $filename); // Set the desired storage path
            $imgFile->save($path); // Save the resized image
            $data->photo = 'profile/' . $filename; // Store the image path in your data model or database
        }
        $data->save();

        return redirect()->back()->with('success', 'Profile successfully updated.');



        //$orders_details = $this->ordersdetail->getProductBySecretKey(['user_id' => $user->id]);


    }
}
