<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fssa_answer extends Model
{
    protected $fillable = [
        'title','question_id','id'
    ];
    public $timestamps = false;
}
