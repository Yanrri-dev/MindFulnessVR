<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Scene;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class QuestionController extends Controller
{
    public function index(Scene $scene, $type){

        $questions = Question::all();



        if($type == 'inicio'){

            //return $questions;

            return view('noadmin.questions.index_inicio',compact('questions','scene', 'type'));

        }elseif($type == 'final'){

            return view('noadmin.questions.index_final', compact('questions','scene','type'));

        }


    }

    public function store(Scene $scene, $type, Request $request){

        $user = Auth::user();

        $numQuest = Question::all()->count();

        for($i = 1; $i <=$numQuest; $i++){

            DB::table('answers')->insert([
                'score' => $request['score_'.$i],
                'type' => $type,
                'user_id' => $user->id,
                'scene_id' => $scene->id,
                'question_id'=> $request['id_'.$i],
                'created_at' => Carbon::now('America/Santiago')->toDateTimeString(),
                'updated_at' => Carbon::now('America/Santiago')->toDateTimeString()

            ]);
        }

        if($type == 'inicio'){

            return redirect()->route('scene.show', $scene);

        }elseif($type == 'final'){

            return redirect()->route('scenes');

        }

    }

}
