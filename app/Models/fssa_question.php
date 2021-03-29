<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fssa_question extends Model
{
    protected $fillable = [
        'title','questionnaire_id','id'
    ];
    public $timestamps = false;

    public function questionnaire()
    {
        return $this->belongsTo('fssa_question','questionnaire_id');
    }

    public function answers()
    {
        return $this->hasMany(fssa_answers::class);
    }
}
