<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'fullname',
        'address',
        'gender',
        'birthdate',
        'email',
        'phone',
        'image'
    ];

    public $timestamps = false;

    public function getCurrentIdAtribute()
    {
        return $this->id;
    }

    public function getBirthdayFormatAttribute()
    {
         return Carbon::parse($this->attributes['birthdate'])->format('Y-m-d');
    }
    
}
