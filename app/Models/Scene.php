<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Video;
use App\Models\Answer;

class Scene extends Model
{
    use HasFactory;

    //asignacion masiva
    protected $fillable= ['name', 'slug'];

    //slug en url en vez de id
    public function getRouteKeyName()
    {
        return "slug";
    }

    // polimorfic one to one
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }

    // polimorfic one to one
    public function video(){
        return $this->morphOne(Video::class,'videoable');
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

}
