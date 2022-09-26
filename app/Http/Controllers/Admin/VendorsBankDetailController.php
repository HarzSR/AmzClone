<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorsBankDetailRequest;
use App\Http\Requests\UpdateVendorsBankDetailRequest;
use App\Models\Admin\VendorsBankDetail;

class VendorsBankDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorsBankDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorsBankDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Http\Response
     */
    public function show(VendorsBankDetail $vendorsBankDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorsBankDetail $vendorsBankDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorsBankDetailRequest  $request
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorsBankDetailRequest $request, VendorsBankDetail $vendorsBankDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\VendorsBankDetail  $vendorsBankDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorsBankDetail $vendorsBankDetail)
    {
        //
    }
}
