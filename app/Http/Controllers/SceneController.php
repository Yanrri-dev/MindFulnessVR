<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scene;

class SceneController extends Controller
{
    public function index(){

        $scenes = Scene::all();

        return view('noadmin.scenes.index', compact('scenes'));

    }

    public function show(Scene $scene){

        $url = $scene->video->url;

        return view('noadmin.scenes.show', compact('url','scene'));

    }
}
