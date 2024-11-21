<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View //cambios para filtros y busqueda
{
    // Iniciamos la consulta con el modelo Post
    $query = Post::query();

    // Filtrar por Código del Alumno (si se proporciona)
    if ($request->filled('codigo')) {
        $query->where('Codigo_del_alumno', 'like', '%' . $request->input('codigo') . '%');
    }

    // Filtrar por Fecha de Reserva (si se proporciona)
    if ($request->filled('fecha_reserva')) {
        $query->whereDate('Fecha_de_reserva', '=', $request->input('fecha_reserva'));
    }

    // Ejecutar la consulta y paginar los resultados
    $posts = $query->paginate();

    // Pasamos los resultados a la vista y también la variable de paginación
    return view('post.index', compact('posts'))
        ->with('i', ($request->input('page', 1) - 1) * $posts->perPage());
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $post = new Post();

        return view('post.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        Post::create($request->validated());

        return Redirect::route('posts.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $post = Post::find($id);

        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $post = Post::find($id);

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->validated());

        return Redirect::route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Post::find($id)->delete();

        return Redirect::route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
