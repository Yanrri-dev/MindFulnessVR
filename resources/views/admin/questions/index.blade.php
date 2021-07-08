@extends('adminlte::page')

@section('title', 'MindFulness Admin')

@section('content_header')
    <h1>Lista de Preguntas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.questions.create')}}"> Agregar Pregunta</a>
        </div>
        <div class="card-body">
            <table class="table table-striped display responsive nowrap" id="scenesTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$question->id}}</td>
                            <td>{{$question->name}}</td>
                            <td width="10px">
                                <a class="btn btn-warning btn-sm " href="{{route('admin.questions.edit',$question)}}">Editar</a>
                            </td>
                            {{-- @can('admin.scenes.destroy') --}}
                                <td width="10px">
                                    <form action="{{route('admin.questions.destroy', $question)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            {{-- @endcan --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
         </div>
    </div>
@stop

@section('js')
    <script>

        $(document).ready( function () {
            $('#scenesTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "responsive" : true,
            });
        });

    </script>

@stop
