<!-- Left Sidebar -->

    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="@if(!empty(Auth::guard('admin')->user()->image) && file_exists(public_path('admin/images/admin_images/' . Auth::guard('admin')->user()->image))) {{ asset('admin/images/admin_images/' . Auth::guard('admin')->user()->image) }} @else ../../admin/images/user.png  @endif" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ ucwords(Auth::guard('admin')->user()->name) }}</div>
                <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="{{ url('/admin/logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li @if(Session::get('page') == "dashboard") class="active" @endif >
                    <a href="{{ url('/admin/dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(Auth::guard('admin')->user()->type == 'admin')
                    <li @if(Session::get('page') == "adminPasswordUpdate" || Session::get('page') == 'adminDetailsUpdate') class="active" @endif >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Admin Settings</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "adminPasswordUpdate") class="active" @endif >
                                <a href="{{ url('/admin/admin-password') }}">Admin Password</a>
                            </li>
                            <li @if(Session::get('page') == "adminDetailsUpdate") class="active" @endif>
                                <a href="{{ url('/admin/admin-details') }}">Admin Details</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::guard('admin')->user()->type == 'vendor')
                    <li @if(Session::get('page') == "vendorDetailsUpdate" || Session::get('page') == 'vendorBusinessUpdates' || Session::get('page') == 'vendorBankUpdates') class="active" @endif >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>Vendor Settings</span>
                        </a>
                        <ul class="ml-menu">
                            <li @if(Session::get('page') == "vendorDetailsUpdate") class="active" @endif >
                                <a href="{{ url('/admin/vendor-update/personal') }}">Personal Details</a>
                            </li>
                            @if(Auth::guard('admin')->user()->status == 1)
                                <li @if(Session::get('page') == "vendorBusinessUpdates") class="active" @endif>
                                    <a href="{{ url('/admin/vendor-update/business') }}">Business Details</a>
                                </li>
                                <li @if(Session::get('page') == "vendorBankUpdates") class="active" @endif>
                                    <a href="{{ url('/admin/vendor-update/bank') }}">Bank Details</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- #Menu -->

        @include('admin.layouts.footer')

    </aside>

<!-- #END# Left Sidebar -->
