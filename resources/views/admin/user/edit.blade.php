@extends('admin.layout.master')
@section('title', 'Admin Edit')
@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Admin Update</h5>
                        <span>Here is the admin create form.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}s"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}">Admin</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.admin.index') }}">Admin Create</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        <div class="col-md-8 m-auto">
                            <div class="card">
                                <div class="card-header bg-info">
                                    <h5 class="text-white"> Admin Update Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.admin.update', $user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="name" class="col-12 col-md-3 col-form-label">Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="name" id="name"
                                                    value="{{ old('name', $user->name) }}" class="form-control"
                                                    placeholder="User name">
                                                @error('name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Email</label>
                                            <div class="col-12 col-md-9">
                                                <input type="email" name="email"
                                                    value="{{ old('email', $user->email) }}" id="email"
                                                    class="form-control" placeholder="User email">
                                                @error('email')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="example-select"
                                                class="col-12 col-md-3 col-form-label">Password</label>
                                            <div class="col-12 col-md-9">
                                                <input type="password" name="password" value="" id="password"
                                                    class="form-control" placeholder="password">
                                                @error('password')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="password_confirmation"
                                                class="col-12 col-md-3 col-form-label">Confirm
                                                Password</label>
                                            <div class="col-12 col-md-9">
                                                <input type="password" name="password_confirmation" value=""
                                                    id="password_confirmation" class="form-control"
                                                    placeholder="Confirm password">
                                                @error('password_confirmation')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-select" class="col-12 col-md-3 col-form-label">User
                                                Phone</label>
                                            <div class="col-12 col-md-9">
                                                <input type="number" name="phone" id="phone"
                                                    value="{{ old('phone', $user->phone) }}" class="form-control"
                                                    placeholder="User phone number">
                                                @error('phone')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row">
                                            <label class="col-12 col-md-3 col-form-label">Status</label>
                                            <div class="col-12 col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            {{ old('status', $user->status) == '1' ? 'checked' : '' }}
                                                            id="gender-1" value="1"> Active
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            {{ old('status', $user->status) == '0' ? 'checked' : '' }}
                                                            id="gender-2" value="0"> Inactive
                                                    </label>
                                                </div>
                                                @error('status')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror

                                            </div>
                                        </div>
                                        {{-- <div class="row mb-3">
                                <label for="role" class="col-12 col-md-3 col-form-label">User Role</label>
                                <div class="col-12 col-md-9">
                                    <select name="role" id="role" class="form-select">
                                        <option value="">Select One</option>
                                        <option {{ old('role', $user->role) == 1 ? 'selected' : '' }} value="1">User
                                        </option>
                                        <option {{ old('role', $user->role) == 2 ? 'selected' : '' }} value="2">Admin
                                        </option>
                                        <option {{ old('role', $user->role) == 3 ? 'selected' : '' }} value="3">Super
                                            Admin
                                        </option>

                                    </select>
                                    @error('role')
                                        <div class="help-block text-danger">{{ $message }} </div>
                                    @enderror
                                </div>
                            </div> --}}

                                        <div class="text-center mb-3">
                                            <a href="{{ route('admin.admin.index') }}" class="btn btn-danger">Back</a>
                                            <input type="submit" class="btn btn-primary  " value="Update Admin">
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(function() {

        });
    </script>
@endpush
