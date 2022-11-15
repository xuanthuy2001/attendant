<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTeachersRequest;
use App\Http\Requests\UpdateTeachersRequest;

class TeachersController extends Controller
{
   
    public function index()
    {DB::enableQueryLog();

        $search  = '';

        if(isset($_GET['search']))
        {
            $search  = $_GET['search'];
        }

        $title = 'Teacher';
        $teachers = Teachers::query()
            ->where('first_Name',  'LIKE', "%$search%") 
            ->orWhere('last_Name',  'LIKE', "%$search%")
            ->paginate(15) ;
        return view('teachers.index',[
            'title' => $title,
            'teachers' => $teachers
        ]);
    }

    public function searchByName(Request $request)
    {
        $keyword = $request->input('search');
        $cakes = Teachers::query()
        ->where('first_Name',  'LIKE', "%$keyword%") -> get();
        $response = array();
        foreach($cakes as $employee){
           $response[] = array("value"=>$employee->id,"label"=>$employee->name);
        }
    
        return response()->json($response); 
    }


    public function create()
    {
        $title = 'Teacher create';
        return view('teachers.create',[
            'title' => $title,
        ]);
    }

    
    public function store(StoreTeachersRequest $request)
    {
        // dd($request -> input());
        $teacher = new Teachers();
        $teacher->first_Name = $request->input('first_name');
        $teacher->last_Name = $request->input('last_name');
        $teacher->address = $request->input('address');
        $teacher->email = $request->input('email');
        $teacher->phone = $request->input('phone');
        $teacher->image = $request->input('image');

        $teacher->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show(Teachers $teachers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit(Teachers $teachers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeachersRequest  $request
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeachersRequest $request, Teachers $teachers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teachers)
    {
        //
    }
}
