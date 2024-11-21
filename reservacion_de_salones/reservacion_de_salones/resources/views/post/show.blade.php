@extends('layouts.app')

@section('template_title')
    {{ $post->name ?? __('Show') . " " . __('Post') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Post</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha De Reserva:</strong>
                                    {{ $post->Fecha_de_reserva }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Lugar:</strong>
                                    {{ $post->Lugar }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Duracion:</strong>
                                    {{ $post->Duracion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Nombre Del Alumno:</strong>
                                    {{ $post->Nombre_del_alumno }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Codigo Del Alumno:</strong>
                                    {{ $post->Codigo_del_alumno }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
