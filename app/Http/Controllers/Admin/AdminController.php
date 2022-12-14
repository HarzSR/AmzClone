<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Vendor;
use App\Models\Admin\VendorsBankDetail;
use App\Models\Admin\VendorsBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
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
            elseif(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 0]))
            {
                return redirect('/admin/error/201')->with('error_message', 'User Disabled. Opening Dashboard with Limited Privilage.');
            }
            else
            {
                return redirect()->back()->with('error_message', 'Invalid Email or Password')->withInput($request->input());
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

        return redirect('/admin/login')->with('success_message', 'Logout Successful');
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
                    return redirect()->back()->with('error_message', 'New password and Confirm password are not same');
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

    /**
     * Update Admin Details
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function updateAdminDetails(Request $request)
    {
        Session::put('page', 'adminDetailsUpdate');

        $userDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();

        if($request->isMethod('POST'))
        {
            $data = $request->all();

            $rules = [
                'name' => 'nullable|min:3|regex:/^[-_ a-zA-Z0-9]+$/',
                'number' => 'nullable|min:8|regex:/^([0-9\s\-\+\(\)]*)$/',
                'adminImage' => 'nullable|mimes:jpeg,jpg,png',
                'note' => 'nullable|min:3|max:2048|regex:/^[-_ a-zA-Z0-9]+$/'
            ];
            $customMessages = [
                'name.min' => 'The name is too short.',
                'name.regex' => 'The name has unauthorised characters.',
                'number.min' => 'The number is too short.',
                'number.regex' => 'The number is in invalid format.',
                'adminImage.mimes' => 'Invalid image format. Allowed: jpeg, jpg, png.',
                'note.min' => 'Note is too short. Please type more.',
                'note.max' => 'Note is too large. Please reduce size to 2000 characters.',
                'note.regex' => 'The note is in invalid format.',
            ];

            $this->validate($request, $rules, $customMessages);

            $image = 0;
            $name = 0;
            $number = 0;
            $note = 0;

            if($request->hasFile('adminImage'))
            {
                $image_tmp = $request->file('adminImage');

                if ($image_tmp->isValid())
                {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = time() . mt_rand() . '.' . $extension;

                    $imagePath = 'admin/images/admin_images/' . $imageName;

                    Image::make($image_tmp)->resize(300, 400)->save($imagePath);
                }

                $image = 1;

            }

            if($request->has('name') && $data['name'] != '' && $userDetails['name'] != $data['name'])
            {
                $name = 1;
            }

            if($request->has('number') && $data['number'] != '' && $userDetails['mobile'] != $data['number'])
            {
                $number = 1;
            }

            if($request->has('note') && $data['note'] != '' && $userDetails['notes'] != $data['note'])
            {
                $note = 1;
            }

            if($image == 0 && $name == 0 && $number == 0 && $note == 0)
            {
                return redirect()->back()->with('neutral_message', 'No updates were made.');
            }
            else if($image == 0 && $name == 0 && $number == 0 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User notes updated');
            }
            else if($image == 0 && $name == 0 && $number == 1 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['mobile' => $data['number']]);

                return redirect()->back()->with('success_message', 'User number updated');
            }
            else if($image == 0 && $name == 0 && $number == 1 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['mobile' => $data['number'], 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User number & notes updated');
            }
            else if($image == 0 && $name == 1 && $number == 0 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name']]);

                return redirect()->back()->with('success_message', 'User name updated');
            }
            else if($image == 0 && $name == 1 && $number == 0 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User name & notes updated');
            }
            else if($image == 0 && $name == 1 && $number == 1 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['number']]);

                return redirect()->back()->with('success_message', 'User name & number updated');
            }
            else if($image == 0 && $name == 1 && $number == 1 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['number'], 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User name, number & notes updated');
            }
            else if($image == 1 && $name == 0 && $number == 0 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName]);

                return redirect()->back()->with('success_message', 'User image was updated');
            }
            else if($image == 1 && $name == 0 && $number == 0 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName, 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User image & notes updated');
            }
            else if($image == 1 && $name == 0 && $number == 1 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName, 'mobile' => $data['number']]);

                return redirect()->back()->with('success_message', 'User image & number updated');
            }
            else if($image == 1 && $name == 0 && $number == 1 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName, 'mobile' => $data['number'], 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User image, number & notes updated');
            }
            else if($image == 1 && $name == 1 && $number == 0 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName, 'name' => $data['name']]);

                return redirect()->back()->with('success_message', 'User image & name updated');
            }
            else if($image == 1 && $name == 1 && $number == 0 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName, 'name' => $data['name'], 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User image, name & notes updated');
            }
            else if($image == 1 && $name == 1 && $number == 1 && $note == 0)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => $imageName, 'name' => $data['name'], 'mobile' => $data['number']]);

                return redirect()->back()->with('success_message', 'User name, number & number updated');
            }
            else if($image == 1 && $name == 1 && $number == 1 && $note == 1)
            {
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['number'], 'notes' => $data['note']]);

                return redirect()->back()->with('success_message', 'User details updated');
            }
            else
            {
                return redirect()->back()->with('error_message', 'Invalid data, please try again')->withInput($request->input());
            }
        }

        return view('admin.settings.update_admin_details')->with(compact('userDetails'));
    }

    /**
     * Delete Admin Notes
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function deleteAdminNotes()
    {
        Admin::where('id', Auth::guard('admin')->user()->id)->update(['notes' => null]);

        return redirect()->back()->with('success_message', 'Notes removed successfully');
    }

    /**
     * Delete Admin Images
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function deleteAdminImage()
    {
        $imageName = Admin::select('image')->where('id', Auth::guard('admin')->user()->id)->first();

        $image_path = 'admin/images/admin_images/' . $imageName->image;

        // File::delete($large_image_path, $medium_image_path, $small_image_path);
        if (file_exists($image_path) && !empty($imageName->image))
        {
            unlink($image_path);
        }

        Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => '']);

        return redirect()->back()->with('success_message', 'Image removed successfully');
    }

    /**
     * Update Vendor Details, Bank Details, Business Details
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     * @throws \Illuminate\Validation\ValidationException
     */

    public function updateVendorDetails(Request $request, $slug = null)
    {
        if($request->isMethod('POST'))
        {
            $data = $request->all();

            if($slug == 'personal')
            {
                $rules = [
                    'name' => 'nullable|min:3|regex:/^[-_ a-zA-Z0-9]+$/',
                    'number' => 'nullable|min:8|regex:/^([0-9\s\-\+\(\)]*)$/',
                    'address' => 'nullable|min:3|regex:/^[-_ a-zA-Z0-9]+$/',
                    'city' => 'nullable|min:3|regex:/^[-_ a-zA-Z]+$/',
                    'state' => 'nullable|min:3|regex:/^[-_ a-zA-Z]+$/',
                    'pincode' => 'nullable|min:3|regex:/^[-_ a-zA-Z0-9]+$/',
                    'vendorImage' => 'nullable|mimes:jpeg,jpg,png',
                    'note' => 'nullable|min:3|max:2048|regex:/^[-_ a-zA-Z0-9]+$/'
                ];
                $customMessages = [
                    'name.min' => 'The name is too short.',
                    'name.regex' => 'The name has unauthorised characters.',
                    'number.min' => 'The number is too short.',
                    'number.regex' => 'The number is in invalid format.',
                    'address.min' => 'The address is too short.',
                    'address.regex' => 'The address has unauthorised characters.',
                    'city.min' => 'The city is too short.',
                    'city.regex' => 'The city has unauthorised characters.',
                    'state.min' => 'The state is too short.',
                    'state.regex' => 'The state has unauthorised characters.',
                    'pincode.min' => 'The pincode is too short.',
                    'pincode.regex' => 'The pincode has unauthorised characters.',
                    'adminImage.mimes' => 'Invalid image format. Allowed: jpeg, jpg, png.',
                    'note.min' => 'Note is too short. Please type more.',
                    'note.max' => 'Note is too large. Please reduce size to 2000 characters.',
                    'note.regex' => 'The note is in invalid format.',
                ];

                $this->validate($request, $rules, $customMessages);
            }
            elseif($slug == 'business')
            {
                echo '<pre>';
                print_r($data);
                die;
            }
            elseif($slug == 'bank')
            {
                echo '<pre>';
                print_r($data);
                die;
            }
            else
            {
                return redirect('/admin/error/404')->with('error_message', 'Invalid data, please try again');
            }
        }

        $userDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();

        if($slug == 'personal')
        {
            Session::put('page', 'vendorDetailsUpdate');
        }
        elseif($slug == 'business')
        {
            if($userDetails['status'] == 0)
            {
                return redirect('/admin/error/201')->with('error_message', 'User Disabled. Check with Admin.');
            }

            Session::put('page', 'vendorBusinessUpdates');
        }
        elseif($slug == 'bank')
        {
            if($userDetails['status'] == 0)
            {
                return redirect('/admin/error/201')->with('error_message', 'User Disabled. Check with Admin.');
            }

            Session::put('page', 'vendorBankUpdates');
        }
        else
        {
            return redirect('/admin/error/404')->with('error_message', 'Invalid data, please try again');
        }

        if($userDetails['status'] == 0)
        {
            $userStatus = 'disabled';
        }
        elseif($userDetails['status'] == 1)
        {
            $userStatus = '';
        }
        else
        {
            $userStatus = 'disabled';
        }
        $vendorDetails = Vendor::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        $vendorBusinessDetails = VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        if($vendorBusinessDetails['status'] == 0)
        {
            $businessStatus = 'disabled';
        }
        elseif($vendorBusinessDetails['status'] == 1)
        {
            $businessStatus = '';
        }
        else
        {
            $businessStatus = 'disabled';
        }
        $vendorBankDetails = VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        if($vendorBankDetails['status'] == 0)
        {
            $bankStatus = 'disabled';
        }
        elseif($vendorBankDetails['status'] == 1)
        {
            $bankStatus = '';
        }
        else
        {
            $bankStatus = 'disabled';
        }

        return view('admin.settings.update_vendor_details')->with(compact('slug', 'userDetails', 'userStatus', 'vendorDetails', 'vendorBusinessDetails', 'businessStatus', 'vendorBankDetails', 'bankStatus'));
    }

    public function fixVendorStatus()
    {
        if(Auth::guard('admin')->user()->status == 0 || Auth::guard('admin')->user()->status == 1)
        {
            return redirect()->back()->with('error_message', 'Status already perfect. Please refresh page');
        }

        Admin::where('id', Auth::guard('admin')->user()->id)->update(['status' => 0]);

        return redirect()->back()->with('success_message', 'Fixed status successfully');
    }

    /**
     * Delete Vendor Notes
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function deleteVendorNotes($slug = null)
    {
        if($slug == null)
        {
            return redirect('/admin/error/404')->with('error_message', 'Invalid data, please try again');
        }
        elseif($slug == 'personal')
        {
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['notes' => null]);
        }
        elseif($slug == 'business')
        {
            VendorsBusinessDetail::where('id', Auth::guard('admin')->user()->vendor_id)->update(['notes' => null]);
        }
        elseif($slug == 'bank')
        {
            VendorsBankDetail::where('id', Auth::guard('admin')->user()->vendor_id)->update(['notes' => null]);
        }
        else
        {
            return redirect('/admin/error/404')->with('error_message', 'Invalid data, please try again');
        }

        return redirect()->back()->with('success_message', 'Notes removed successfully');
    }

    /**
     * Delete Vendor Images
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function deleteVendorImages($slug = null)
    {
        if($slug == null)
        {
            return redirect('/admin/error/404')->with('error_message', 'Invalid data, please try again');
        }
        elseif($slug == 'personal')
        {
            $imageName = Admin::select('image')->where('id', Auth::guard('admin')->user()->id)->first();

            $image_path = 'admin/images/vendor_images/' . $imageName->image;

            // File::delete($large_image_path, $medium_image_path, $small_image_path);
            if (file_exists($image_path) && !empty($imageName->image))
            {
                unlink($image_path);
            }

            Admin::where('id', Auth::guard('admin')->user()->id)->update(['image' => '']);
        }
        elseif($slug == 'business')
        {
            $imageName = VendorsBusinessDetail::select('image')->where('vendor_id', Auth::guard('admin')->user()->vendor_id)->first();

            $image_path = 'admin/images/business_images/' . $imageName->image;

            // File::delete($large_image_path, $medium_image_path, $small_image_path);
            if (file_exists($image_path) && !empty($imageName->image))
            {
                unlink($image_path);
            }

            VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update(['image' => '']);
        }
        else
        {
            return redirect('/admin/error/404')->with('error_message', 'Invalid data, please try again');
        }

        return redirect()->back()->with('success_message', 'Image removed successfully');
    }

    /**
     * Error Pages
     *
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void1
     */

    public function error($slug = null)
    {
        if($slug != null)
        {
            return view('admin.error.custom_error')->with(compact('slug'));
        }
    }
}
