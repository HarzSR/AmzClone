@extends('admin.layouts.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if(\Illuminate\Support\Facades\Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong> {{ \Illuminate\Support\Facades\Session::get('error_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('neutral_message'))
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Notice: </strong> {{ \Illuminate\Support\Facades\Session::get('neutral_message') }}
                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Success: </strong> {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error: </strong>
                            <br>
                            @foreach($errors->all() as $error)
                                &emsp; &#x2022; {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <form action="{{ url('/admin/admin-details') }}" method="POST" id="updateAdminDetails" name="updateAdminDetails" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="@if(!empty(Auth::guard('admin')->user()->image)  && file_exists(public_path('admin/images/admin_images/' . Auth::guard('admin')->user()->image))) {{ asset('admin/images/admin_images/' . Auth::guard('admin')->user()->image) }} @else ../../admin/images/user.png  @endif" alt="AdminBSB - Profile Image" width="128px" height="128px"/>
                                </div>
                                <div class="content-area">
                                    <h3>{{ ucwords($userDetails['name']) }}</h3>
                                    <p></p>
                                </div>
                                @if(!empty(Auth::guard('admin')->user()->image) && file_exists(public_path('admin/images/admin_images/' . Auth::guard('admin')->user()->image)))
                                    <div class="btn-group-xs align-right">
                                        <button type="button" id="deleteAdmin" name="deleteAdmin" dataId="admin-image" dataName="Admin Image" class="btn bg-red waves-effect m-r-5 m-t-5">Delete</button>
                                    </div>
                                @elseif(!empty(Auth::guard('admin')->user()->image))
                                    <div class="btn-group-xs align-right">
                                        <button type="button" id="deleteAdmin" name="deleteAdmin" dataId="admin-image" dataName="Admin Image" class="btn bg-red waves-effect m-r-5 m-t-5">Invalid Image for Admin. Suggest click here.</button>
                                    </div>
                                @endif
                            </div>
                            <div class="profile-footer">
                                <label>Update Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control" id="adminImage" name="adminImage" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    UPDATE ADMIN DETAILS
                                </h2>
                            </div>
                            <div class="body">
                                <div class="col-md-3">
                                    <label>Admin Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Admin Type</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['type']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Admin Email</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ $userDetails['email'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>Admin Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['mobile']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>New Name</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" @if(!empty(old('name'))) value="{{ ucwords(old('name')) }}" @else value="{{ trim(ucwords($userDetails['name'])) }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>New Mobile</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="number" name="number" class="form-control" placeholder="Enter Mobile" @if(!empty(old('mobile'))) value="{{ ucwords(old('mobile')) }}" @else value="{{ trim(ucwords($userDetails['mobile'])) }}" @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Notes</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="description" id="note" name="note" class="form-control no-resize" placeholder="Enter Notes" @if(!empty(old('note'))) value="{{ ucwords(old('note')) }}" @else @if ($userDetails['notes'] != null) value="{{ trim(ucwords($userDetails['notes'])) }}" @endif @endif>
                                        </div>
                                        @if(!empty(Auth::guard('admin')->user()->notes))
                                            <div class="btn-group-xs align-right">
                                                <button type="button" id="deleteAdmin" name="deleteAdmin"  dataId="notes" dataName="Notes" class="btn bg-red waves-effect m-t-5">Delete</button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect" id="detailUpdate" name="detailUpdate">UPDATE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
