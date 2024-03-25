<?php

namespace App\Http\Controllers;

use App\Models\HomePerson;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setting', compact('setting'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            "name" => 'required|string|max:255',
            "phone" => 'required|string|max:255',
            "email" => 'required|email|max:255',
            "address" => 'required|string|max:255',
            "website" => 'required|string|max:255',
            "logo" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::first();
        if ($setting) {
            $setting->name = $request->name;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->website = $request->website;
            $setting->save();
        } else {
            $setting = new Setting();
            $setting->name = $request->name;
            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->address = $request->address;
            $setting->website = $request->website;
            $setting->save();
        }

        return redirect()->back()->with('success', 'Setting update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function homeSettingPersonIndex()
    {
        $datas = HomePerson::paginate();
        return view('admin.home_setting.person_list', compact('datas'));
    }
    public function homeSettingPersonCreate()
    {

        return view('admin.home_setting.person_create');
    }
    public function homeSettingPersonStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "name" => 'required|string|max:255',
            "designation" => 'required|string|max:255',
            "address" => 'required|string|max:255',
            "text" => 'required|string|max:2000',
            "image" => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $data = new HomePerson();
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->address = $request->address;
        $data->text = $request->text;
        $data->image = '';
        $data->status = 1;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            //dfgdfg
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!Storage::exists('public/home_person')) {
                Storage::makeDirectory('public/home_person');
            }
            $path = public_path('storage/home_person/' . $filename); // Set the desired storage path
            $imgFile->save($path); // Save the resized image
            $data->image = 'home_person/' . $filename; // Store the image path in your data model or database
        }
        $data->save();

        return redirect()->route('admin.home-setting.person.index')->with('success', 'Person added successfully');
    }

    public function homeSettingPersonEdit($id)
    {
        $data = HomePerson::find($id);
        return view('admin.home_setting.person_edit', compact('data'));
    }
    public function homeSettingPersonUpdate(Request $request, $id)
    {
        $request->validate([
            "name" => 'required|string|max:255',
            "designation" => 'required|string|max:255',
            "address" => 'required|string|max:255',
            "text" => 'required|string|max:2000',
            "image" => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            "status" => 'required|boolean',
        ]);
        $data = HomePerson::find($id);
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->address = $request->address;
        $data->text = $request->text;
        $data->status = $request->status;


        if ($request->hasFile('image')) {
            if ($data->photo) {
                Storage::delete('public/' . $data->photo);
            }
            $image = $request->file('image');

            $filename = time() . '_' . $image->getClientOriginalName();
            //dfgdfg
            $imgFile = Image::make($image->getRealPath());
            $imgFile->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            if (!Storage::exists('public/home_person')) {
                Storage::makeDirectory('public/home_person');
            }
            $path = public_path('storage/home_person/' . $filename); // Set the desired storage path
            $imgFile->save($path); // Save the resized image
            $data->image = 'home_person/' . $filename; // Store the image path in your data model or database
        }
        $data->save();

        return redirect()->route('admin.home-setting.person.index')->with('success', 'Person added successfully');
    }
}
