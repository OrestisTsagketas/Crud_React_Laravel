<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fssa_questionnaire extends Model
{
    protected $fillable = [
        'title','id'
    ];
    public $timestamps = false;

    public function questions()
    {
        return $this->hasMany('App\Models\fssa_question');
    }
}
