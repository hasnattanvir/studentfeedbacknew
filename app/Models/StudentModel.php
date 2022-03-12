<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    use HasFactory;
     protected $table = 'students';
      protected $fillable = [
        'name',
        'roll',
        'regi',
        'faculty',
        'department',
        'batch',
        'phone',
        'shift',
        'status',
        'type',
        'password'];
}
