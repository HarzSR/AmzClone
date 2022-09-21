@extends('admin.layouts.layout')

@section('content')

    <section class="content">
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                UPDATE ADMIN PASSWORD
                            </h2>
                        </div>
                        <div class="body">
                            <form>
                                <div class="col-md-3">
                                    <label for="email_address">Admin Name Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['name']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="email_address">Admin Type</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['type']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="email_address">Admin Email Address</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ $userDetails['email'] }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="email_address">Admin Number</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" disabled value="{{ ucwords($userDetails['mobile']) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Current Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Enter Current Password" required>
                                        </div>
                                        <div class="help-info" id="currentPassError" name="currentPassError"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="password">New Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="new_password" name="new_password" class="form-control" placeholder="Enter New Password" required>
                                        </div>
                                        <div class="help-info" id="newPassError" name="newPassError"></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="password">Repeat New Password</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Repeat New Password" required>
                                        </div>
                                        <div class="help-info" id="confirmPassError" name="confirmPassError"></div>
                                    </div>
                                </div>
                                <br>
                                <button type="button" class="btn btn-success m-t-15 waves-effect" id="passUpdate" name="passUpdate">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
