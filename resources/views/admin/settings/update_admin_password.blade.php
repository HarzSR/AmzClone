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

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPDATE ADMIN PASSWORD
                            </h2>
                        </div>
                        <div class="body">
                            <form action="{{ url('/admin/admin-password') }}" method="POST" id="updateAdminPassword" name="updateAdminPassword">
                                @csrf
                                <div class="col-md-3">
                                    <label">Admin Name</label>
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
                                <div class="col-md-4">
                                    <label>Current Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Enter Current Password" required>
                                        </div>
                                        <div class="help-info" id="currentPassError" name="currentPassError"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>New Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter New Password" required>
                                        </div>
                                        <div class="help-info" id="newPassError" name="newPassError"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Repeat New Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Repeat New Password" required>
                                        </div>
                                        <div class="help-info" id="confirmPassError" name="confirmPassError"></div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-success m-t-15 waves-effect" id="passUpdate" name="passUpdate">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
