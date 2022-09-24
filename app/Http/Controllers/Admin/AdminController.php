<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    public function destroy(Admin $admin)
    {
        //
    }

    /**
     * Display dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function dashboard()
    {
        //

        Session::put('page', 'dashboard');

        return view('admin.dashboard');
    }

    /**
     * Display login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function login(Request $request)
    {
        //

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|min:8',
            ];
            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'The email must be a valid email address.',
                'email.max' => 'The email is too long, please try a different email address.',
                'password.required' => 'Password is required',
                'password.min' => 'The password is incorrect and short.',
            ];

            $this->validate($request, $rules, $customMessages);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1]))
            {
                return redirect('/admin/dashboard');
            }
            else
            {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }

        return view('admin.login');
    }

    /**
     * Logout Functionality
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function logout()
    {
        Auth::guard('admin')->logout();

        Session::flush();

        return redirect('/admin/login');
    }

    /**
     * Update Admin Password Page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */

    public function updateAdminPassword(Request $request)
    {
        Session::put('page', 'adminPasswordUpdate');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            $rules = [
                'current_password' => 'required|min:8',
                'new_password' => 'required|min:8',
                'confirm_password' => 'required|min:8',
            ];
            $customMessages = [
                'current_password.required' => 'Current password is required',
                'current_password.min' => 'The current password is incorrect and short.',
                'new_password.required' => 'New password is required',
                'new_password.min' => 'The new password is incorrect and short.',
                'confirm_password.required' => 'Confirm password is required',
                'confirm_password.min' => 'The confirm password is incorrect and short.',
            ];

            $this->validate($request, $rules, $customMessages);

            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
            {
                if ($data['current_password'] == $data['new_password'])
                {
                    return redirect()->back()->with('error_message', 'New password can\'t be the same as current password');
                }
                else if ($data['new_password'] != $data['confirm_password'])
                {
                    return redirect()->back()->with('error_message', 'New password and Cofirm password are not same');
                }
                else
                {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);

                    return redirect()->back()->with('success_message', 'Password update Successful');
                }
            }
            else
            {
                return redirect()->back()->with('error_message', 'Current password is Incorrect');
            }
        }

        $userDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();

        return view('admin.settings.update_admin_password')->with(compact('userDetails'));
    }

    /**
     * Check User Password
     *
     * @param Request $request
     * @return void
     */

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();

        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
        {
            echo 'True';
        }
        else
        {
            echo 'False';
        }
    }

    public function updateAdminDetails(Request $request)
    {
        Session::put('page', 'adminDetailsUpdate');

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            $rules = [
                'name' => 'nullable|min:3|regex:/^[-_ a-zA-Z0-9]+$/',
                'number' => 'nullable|min:8|regex:/^([0-9\s\-\+\(\)]*)$/',
            ];
            $customMessages = [
                'name.min' => 'The name is too short.',
                'name.regex' => 'The name has unauthorised characters.',
                'number.min' => 'The number is too short.',
                'number.regex' => 'The number is in invalid format.',
            ];

            $this->validate($request, $rules, $customMessages);

            if ($data['name'] == "" && $data['number'] == "")
            {
                return redirect()->back()->with('success_message', 'No updates were made');
            }
            else if ($data['name'] != '' && $data['number'] == '')
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name']]);

                return redirect()->back()->with('success_message', 'User name is updated');
            }
            else if ($data['name'] == '' && $data['number'] != '')
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['mobile' => $data['number']]);

                return redirect()->back()->with('success_message', 'User number is updated');
            }
            else if ($data['name'] != '' && $data['number'] != '')
            {
                if (Auth::guard('admin')->user()->name != $data['name'] && Auth::guard('admin')->user()->mobile != $data['number'])
                {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['number']]);

                    return redirect()->back()->with('success_message', 'User details updated');
                }
                else if (Auth::guard('admin')->user()->name == $data['name'] && Auth::guard('admin')->user()->mobile != $data['number'])
                {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['mobile' => $data['number']]);

                    return redirect()->back()->with('success_message', 'User number is updated');
                }
                else if (Auth::guard('admin')->user()->name != $data['name'] && Auth::guard('admin')->user()->mobile == $data['number'])
                {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name']]);

                    return redirect()->back()->with('success_message', 'User name is updated');
                }
                else if (Auth::guard('admin')->user()->name == $data['name'] && Auth::guard('admin')->user()->mobile == $data['number'])
                {
                    return redirect()->back()->with('success_message', 'No updates were made');
                }
            }
            else
            {
                return redirect()->back()->with('error_message', 'Invalid data, please try again');
            }
        }

        $userDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();

        return view('admin.settings.update_admin_details')->with(compact('userDetails'));
    }
}
