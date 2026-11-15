<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyRoster extends Model
{
    protected $fillable = ['faculty_id', 'name', 'email'];
}