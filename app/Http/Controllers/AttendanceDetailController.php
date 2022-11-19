<?php

namespace App\Http\Controllers;

use App\Models\attendance_detail;
use App\Http\Requests\Storeattendance_detailRequest;
use App\Http\Requests\Updateattendance_detailRequest;

class AttendanceDetailController extends Controller
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
     * @param  \App\Http\Requests\Storeattendance_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeattendance_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance_detail  $attendance_detail
     * @return \Illuminate\Http\Response
     */
    public function show(attendance_detail $attendance_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance_detail  $attendance_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance_detail $attendance_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateattendance_detailRequest  $request
     * @param  \App\Models\attendance_detail  $attendance_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Updateattendance_detailRequest $request, attendance_detail $attendance_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance_detail  $attendance_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance_detail $attendance_detail)
    {
        //
    }
}
