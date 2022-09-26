<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorsBusinessDetailRequest;
use App\Http\Requests\UpdateVendorsBusinessDetailRequest;
use App\Models\Admin\VendorsBusinessDetail;

class VendorsBusinessDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorsBusinessDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorsBusinessDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Http\Response
     */
    public function show(VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorsBusinessDetailRequest  $request
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorsBusinessDetailRequest $request, VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\VendorsBusinessDetail  $vendorsBusinessDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorsBusinessDetail $vendorsBusinessDetail)
    {
        //
    }
}
