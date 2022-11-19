<?php

namespace App\Http\Controllers;

use App\Models\lich_hoc;
use App\Http\Requests\Storelich_hocRequest;
use App\Http\Requests\Updatelich_hocRequest;

class LichHocController extends Controller
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
     * @param  \App\Http\Requests\Storelich_hocRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storelich_hocRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lich_hoc  $lich_hoc
     * @return \Illuminate\Http\Response
     */
    public function show(lich_hoc $lich_hoc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lich_hoc  $lich_hoc
     * @return \Illuminate\Http\Response
     */
    public function edit(lich_hoc $lich_hoc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatelich_hocRequest  $request
     * @param  \App\Models\lich_hoc  $lich_hoc
     * @return \Illuminate\Http\Response
     */
    public function update(Updatelich_hocRequest $request, lich_hoc $lich_hoc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lich_hoc  $lich_hoc
     * @return \Illuminate\Http\Response
     */
    public function destroy(lich_hoc $lich_hoc)
    {
        //
    }
}
