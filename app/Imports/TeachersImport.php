<?php

namespace App\Imports;

use App\Models\Teachers;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TeachersImport implements ToModel, WithValidation,WithHeadingRow,SkipsOnFailure,SkipsOnError
{
    use Importable, SkipsErrors,SkipsFailures;
    public function model($row=[])
    {
        return new Teachers([
            'teacher_id'=>$row["teacher_id"],
            'fullname'=>$row["fullname"],
            'address'=>$row["address"],
            'gender'=>$row["gender"],
            'birthdate'=>Date::excelToDateTimeObject($row["birthdate"]),
            'email'=>$row["email"],
            'phone'=>$row["phone"],
            'image'=>$row["image"],
            
        ]);
    }
    public function rules(): array
    {
        return [
            'email' => Rule::unique('Teachers', 'email'),
            'phone' =>  ['required','unique:Teachers'],
            'teacher_id'=>['required','unique:Teachers']
        ];
    }
   
}
