@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Post
@endsection

@section('content')
    @if(auth()->check() && auth()->user()->role === 'admin') <!-- Verifica que este el role como "admin"si no lo esta no da los privilegios del CRUD -->
        <section class="content container-fluid">
            <div class="">
                <div class="col-md-12">

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">{{ __('Update') }} Post</span>
                        </div>
                        <div class="card-body bg-white">
                            <form method="POST" action="{{ route('posts.update', $post->id) }}" role="form" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                @csrf

                                @include('post.form')

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <p>No tienes permiso para acceder a esta página.</p>
    @endif
@endsection
