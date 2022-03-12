<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign_Teacher_Model extends Model
{
    use HasFactory;
      protected $table = 'assign_teacher';
      protected $fillable = [
        'teacherid',
        'faculty',
        'department',
        'batch',
        'shift',
        'course',
        'status'];
}
