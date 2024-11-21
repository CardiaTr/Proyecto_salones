@extends('layouts.app')

@section('template_title')
    Posts
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Posts') }}
                            </span>

                            <div class="float-right">
                                @if(auth()->check() && auth()->user()->role === 'admin')<!-- Verifica que este el role como "admin"si no lo esta no da los privilegios del CRUD -->
                                    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                        {{ __('Create New') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <!-- Filtros de Búsqueda -->
                    <div class="card-body bg-white">
                        <form action="{{ route('posts.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="codigo" class="form-control" placeholder="Código del Alumno" value="{{ request('codigo') }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="fecha_reserva" class="form-control" value="{{ request('fecha_reserva') }}">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Tabla de Posts -->
                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Fecha De Reserva</th>
                                        <th>Lugar</th>
                                        <th>Duracion</th>
                                        <th>Nombre Del Alumno</th>
                                        <th>Código Del Alumno</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $post->Fecha_de_reserva }}</td>
                                            <td>{{ $post->Lugar }}</td>
                                            <td>{{ $post->Duracion }}</td>
                                            <td>{{ $post->Nombre_del_alumno }}</td>
                                            <td>{{ $post->Codigo_del_alumno }}</td>
                                            <td>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('posts.show', $post->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('posts.edit', $post->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>

                                                    <!-- Verifica si el usuario es admin para mostrar el botón de delete -->
                                                    @if(auth()->check() && auth()->user()->role === 'admin')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); 
                                                        Swal.fire({
                                                            title: 'Are you sure to delete?',
                                                            text: 'This change cannot be undone!',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Yes',
                                                            cancelButtonText: 'No',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                this.closest('form').submit(); // Si el usuario confirma, se envía el formulario
                                                            }
                                                        });">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $posts->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
