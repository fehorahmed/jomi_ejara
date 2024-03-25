@extends('admin.layout.master')
@section('title', 'Home Setting Page')

@section('content')
    {{-- @include('admin.master.flash') --}}

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Home Setting Page</h5>
                        <span>Here is the Home Setting Page form.</span>
                    </div>
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
                                    <h5 class="text-white"> Home Setting Page Form</h5>
                                    <span>Add class of <code>.form-control</code> with
                                        <code>&lt;input&gt;</code> tag</span>
                                </div>
                                <div class="card-block">
                                    <form id="campaign-form" class="form-horizontal" method="post"
                                        action="{{ route('admin.home-setting.person.edit', $data->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="name" class="col-12 col-md-3 col-form-label">Name</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="name" value="{{ old('name', $data->name) }}"
                                                    id="name" class="form-control" placeholder="Enter name">
                                                @error('name')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="designation"
                                                class="col-12 col-md-3 col-form-label">Designation</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="designation"
                                                    value="{{ old('designation', $data->designation) }}" id="designation"
                                                    class="form-control" placeholder="Enter Designation">
                                                @error('designation')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="email" class="col-12 col-md-3 col-form-label">Address</label>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="address"
                                                    value="{{ old('address', $data->address) }}" id="address"
                                                    class="form-control" placeholder="Enter address">
                                                @error('address')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-12 col-md-3 col-form-label">Text</label>
                                            <div class="col-12 col-md-9">
                                                <textarea name="text" id="text" class="form-control" placeholder="Enter text here" cols="10"
                                                    rows="5">{{ old('text', $data->text) }}</textarea>

                                                @error('text')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="image" class="col-12 col-md-3 col-form-label">Image</label>
                                            <div class="col-12 col-md-9">
                                                <input type="file" name="image" id="image" class="form-control">
                                                @error('image')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="row mb-3">
                                            <label for="image" class="col-12 col-md-3 col-form-label">Status</label>
                                            <div class="col-12 col-md-9">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            {{ old('status', $data->status) == '1' ? 'checked' : '' }}
                                                            id="gender-1" value="1"> Active
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="status"
                                                            {{ old('status', $data->status) == '0' ? 'checked' : '' }}
                                                            id="gender-2" value="0"> Inactive
                                                    </label>
                                                </div>
                                                @error('status')
                                                    <div class="help-block text-danger">{{ $message }} </div>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="text-center mb-3">

                                            <input type="submit" class="btn btn-primary  " value="Update Person">
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
@endpush
