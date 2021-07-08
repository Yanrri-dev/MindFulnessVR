<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['name','quest','max_score'];

    //public function answers(){
    //    return $this->belongsToMany(User::class,'answers','question_id','user_id')->withPivot('score','scene_id')->withTimestamps();
    //}

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
