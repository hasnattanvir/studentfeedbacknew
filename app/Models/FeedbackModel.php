<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackModel extends Model
{
    use HasFactory;
    protected $table = 'feedback';
      protected $fillable = [
        'teacherid',
        'studentid',
        'faculty',
        'department',
        'batch',
        'shift',
        'course',
        'one',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine',
        'ten',
        'status'];
}
