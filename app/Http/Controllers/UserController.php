<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = User::where('is_admin', 1)->paginate(10);
        return view('admin.admin.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20|confirmed',
            'phone' => 'required|string|max:20',
            'status' => 'required|numeric',
            // 'division' => 'required|numeric',
            // 'district' => 'required|numeric',
            // 'sub_district' => 'required|numeric',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }


        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->phone = $request->phone;
        $data->is_admin = 1;
        // $data->role = $request->role;
        // $data->division_id = $request->division;
        // $data->district_id = $request->district;
        // $data->sub_district_id = $request->sub_district;
        $data->status = $request->status;

        $data->save();

        return redirect()->route('admin.admin.index')->with('success', 'Admin Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|max:20|confirmed',
            'phone' => 'required|string|max:20',
            'status' => 'required|numeric',
            // 'division' => 'required|numeric',
            // 'district' => 'required|numeric',
            // 'sub_district' => 'required|numeric',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }


        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        $data->phone = $request->phone;
        // $data->role = $request->role;
        // $data->division_id = $request->division;
        // $data->district_id = $request->district;
        // $data->sub_district_id = $request->sub_district;
        $data->status = $request->status;

        $data->update();

        return redirect()->route('admin.admin.index')->with('success', 'Admin Successfully added.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            return response([
                'success' => false,
                'message' => $validate->errors()->first(),
            ]);
        }
        $data = User::find($request->id);
        if ($data->status == 1) {
            $data->status = 0;
        } elseif ($data->status == 0) {
            $data->status = 1;
        }
        $data->save();
        return response([
            'success' => true,
            'message' => 'Status change successful.',
        ]);
    }


    public function userIndex()
    {

        $datas = User::where('is_admin', null)->paginate(10);
        return view('admin.user.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userCreate()
    {

        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function userStore(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:20|confirmed',
            'phone' => 'required|string|max:20',
            'status' => 'required|numeric',
            // 'division' => 'required|numeric',
            // 'district' => 'required|numeric',
            // 'sub_district' => 'required|numeric',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        // dd($request->all());
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->phone = $request->phone;
        // $data->role = $request->role;
        // $data->division_id = $request->division;
        // $data->district_id = $request->district;
        // $data->sub_district_id = $request->sub_district;
        $data->status = $request->status;
        $data->save();

        return redirect()->route('admin.user.index')->with('success', 'User Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|max:20|confirmed',
            'phone' => 'required|string|max:20',
            'status' => 'required|numeric',
            // 'division' => 'required|numeric',
            // 'district' => 'required|numeric',
            // 'sub_district' => 'required|numeric',
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }


        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->password) {
            $data->password = Hash::make($request->password);
        }
        $data->phone = $request->phone;
        // $data->role = $request->role;
        // $data->division_id = $request->division;
        // $data->district_id = $request->district;
        // $data->sub_district_id = $request->sub_district;
        $data->status = $request->status;

        $data->update();

        return redirect()->route('admin.user.index')->with('success', 'User Successfully added.');
    }
}
