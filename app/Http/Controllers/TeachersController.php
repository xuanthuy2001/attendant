<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreTeachersRequest;
use App\Http\Requests\UpdateTeachersRequest;
use App\Imports\TeachersImport;

class TeachersController extends Controller
{
   
    public function index()
    {
        $search  = '';
        if(isset($_GET['search']))
        {
            $search  = $_GET['search'];
        }
        $title = 'Teacher';
        $teachers = Teachers::query()
            ->where('fullname',  'LIKE', "%$search%") 
            ->paginate(3) ;
        return view('teachers.index',[
            'title' => $title,
            'teachers' => $teachers
        ]);
    }

    public function searchByName(Request $request)
    {
        $keyword = $request->input('search');
        $cakes = Teachers::query()
        ->where('fullname',  'LIKE', "%$keyword%") -> get();
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
        $idTeacher='';
        $currentId = explode(" ",  $request->input('fullname')) ;
        foreach ($currentId as $w) {
            $idTeacher .= mb_substr($w, 0, 1);
        }
        $idTeacher=strtoupper($idTeacher).date('Y', strtotime($request->input('birthdate')));
        $teacher = new Teachers();
        $teacher ->teacher_id =  $idTeacher;
        $teacher->fullname = $request->input('fullname');
        $teacher->address = $request-> input('district') . '-' . $request-> input('city');
        $teacher->email = $request->input('email');
        $teacher->phone = $request->input('phone');
        $teacher->birthdate = $request->input('birthdate');
        $teacher->birthdate = $teacher->BirthdayFormat;
        $teacher->gender = $request->input('gender');
        $imageName = "images/teachers/".time().'.'.$request->image->extension();
        $teacher->image =$imageName;
        // Public Folder
        $request->image->move(public_path("images/teachers/{$idTeacher}"), $imageName);
        $teacher->save();
        return redirect()->route('teacher.index')->with('message', 'Thêm thành công');
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
    public function importCsv(Request  $request)
    {
        
        $file = $request->file("csv")->store("import");
        $import = new TeachersImport();
        $import-> import($file);
        return back()->withStatus('Thêm thành công ');
    }
}
