<x-app-layout>


    <div class="container py-8">
        <h1 class="text-3xl font-bold text-gray-700 text-center">Encuesta Final</h1>
    </div>

    {!! Form::open(['route' => ['questions.store',$scene,$type]]) !!}

        @php
            $j = 1;
        @endphp
        @foreach ($questions as $question)
            <input type="hidden" name="id_{{$j}}" value="{{ $question->id }}">
            <div class="text-center pt-4">
                <label for="question{{$j}}">{{$j}}.- {{$question->quest}} Luego de la experiencia</label>
            </div>
                <div class="text-center  py-2">
                    @for ($i = 0; $i < $question->max_score; $i++)
                            <input type="radio" name="score_{{$j}}" id="inlineRadio{{$j}}" value={{$i+1}} @if($i==0) {{'checked="checked"'}}@else {{''}} @endif>
                            <label class="mr-2" for="inlineRadio{{$j}}">{{$i+1}}</label>
                    @endfor
                </div>
            @php
                $j++;
            @endphp
        @endforeach


        <br/>
        <div class="text-center" >
            {!! Form::submit('Subir Respuestas', ['class'=> 'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
        </div>

    {!! Form::close() !!}





</x-app-layout>
