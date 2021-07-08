@extends('adminlte::page')

@section('title', 'MindFulness Admin')

@section('content_header')
    <h1>Agregar Nueva Pregunta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.questions.store', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre Corto') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre corto de la pregunta']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('quest', 'Pregunta Completa') !!}
                    {!! Form::text('quest', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la pregunta completa']) !!}

                    @error('quest')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <div class="form-group">
                        {!! Form::label('max_score', 'Puntaje Máximo') !!}
                        {!! Form::number('max_score', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el puntaje máximo de la pregunta', 'step' => '1']) !!}
                    </div>
                </div>

                {!! Form::submit('Crear Pregunta', ['class'=> 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

