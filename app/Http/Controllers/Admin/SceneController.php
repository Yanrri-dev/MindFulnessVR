<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Scene;
use Illuminate\Support\Facades\Storage;

class SceneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scenes = Scene::all();

        return view('admin.scenes.index', compact('scenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scenes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return Storage::put('scenes',$request->file('img_file'));
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:scenes',
            'video_url' => 'required',
            'img_file' => 'required',
        ]);

        $scene = Scene::create($request->all());

        $scene->video()->create([
            'url' => $request->video_url
        ]);

        $url = Storage::put('scenes', $request->file('img_file'));

        $scene->image()->create([
            'url' => $url
        ]);


        return redirect()->route('admin.scenes.index')->with('info','La escena se agregó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scene $scene)
    {
        $scene->delete();

        return redirect()->route('admin.scenes.index')->with('info','La escena se eliminó con éxito');
    }
}
