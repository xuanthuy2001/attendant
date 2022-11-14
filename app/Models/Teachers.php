<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_Name',
        'last_Name',
        'address',
        'image',
        'email',
        'phone',
    ];

    public $timestamps = false;

    public function getFullNameAttribute() 
    {
        return $this->first_Name . ' ' . $this->last_Name;
    }
}
