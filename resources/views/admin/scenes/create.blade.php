@extends('adminlte::page')

@section('title', 'MindFulness Admin')

@section('content_header')
    <h1>Agregar Nueva Escena</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.scenes.store', 'files' => true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la escena']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la escena', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div>
                    <div class="form-group">
                        {!! Form::label('img_file', 'Imagen de la Escena') !!}
                        {!! Form::file('img_file', ['class' => 'form-control-file']) !!}
                    </div>

                    @error('img_file')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            <img id="picture" src="https://cooperativa.cl/noticias/site/artic/20210225/imag/foto_0000000120210225100311.jpg" alt="Radal-siete-tazas">
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <div>
                    <div class="form-group">
                        {!! Form::label('video_url', 'Video de la Escena') !!}
                        {!! Form::text('video_url', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la url del video de la escena']) !!}
                        {{-- {!! Form::file('video_src', ['class' => 'form-control-file']) !!} --}}
                    </div>
                </div>

                {!! Form::submit('Crear Escena', ['class'=> 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('css')
    <style>

        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        //Cambiar imagen
        document.getElementById("img_file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop
