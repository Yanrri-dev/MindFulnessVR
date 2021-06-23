@extends('adminlte::page')

@section('title', 'HDEP')

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{route('admin.users.create')}}"> Agregar Usuario</a>
        </div>
        <div class="card-body">
            <table class="table table-striped display responsive nowrap" id="userTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td width="10px">
                                <a class="btn btn-warning btn-sm " href="{{route('admin.users.edit',$user)}}">Editar</a>
                            </td>
                            {{-- @can('admin.users.destroy') --}}
                                <td width="10px">
                                    <form action="{{route('admin.users.destroy', $user)}}" method="POST">
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
            $('#userTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
                },
                "responsive" : true,
            });
        });

    </script>

@stop
