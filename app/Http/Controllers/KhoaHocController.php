<?php

namespace App\Http\Controllers;

use App\Models\khoa_hoc;
use App\Http\Requests\Storekhoa_hocRequest;
use App\Http\Requests\Updatekhoa_hocRequest;

class KhoaHocController extends Controller
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
     * @param  \App\Http\Requests\Storekhoa_hocRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storekhoa_hocRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khoa_hoc  $khoa_hoc
     * @return \Illuminate\Http\Response
     */
    public function show(khoa_hoc $khoa_hoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khoa_hoc  $khoa_hoc
     * @return \Illuminate\Http\Response
     */
    public function edit(khoa_hoc $khoa_hoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatekhoa_hocRequest  $request
     * @param  \App\Models\khoa_hoc  $khoa_hoc
     * @return \Illuminate\Http\Response
     */
    public function update(Updatekhoa_hocRequest $request, khoa_hoc $khoa_hoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khoa_hoc  $khoa_hoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(khoa_hoc $khoa_hoc)
    {
        //
    }
}
