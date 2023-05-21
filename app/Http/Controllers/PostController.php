<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $users = User::all();
        $likes = Like::all();
        $route = Route::current();
        $routeName = $route->getName();

        return view('posts.index')->with([
            'posts' => $posts,
            'users'=> $users,
            'likes' => $likes,
            'routeName' => $routeName
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        //..instancia um novo model Post
        $post = new Post();
        // seta o usuário atual da session
        $post->user_id = $request->user()->id;
        //..pega os dados vindos do form e seta no model
        $post->post = $request->input('post');

        // Verificar se é uma postagem ou comentário             
        if ($request->id_parent == null) {
            $post->parent_id = null;
        } else {
            $post->parent_id = $request->id_parent;
        }

        // $post->post = htmlspecialchars($post->post);
        // $post->post = nl2br($post->post);
        // $post->post = str_replace("\n", "<br>", $post->post);
                
        // dd($post->post);

        //..persiste o model na base de dados
        $post->save();

        //..retorna a view com uma variável msg que será tratada na própria view
        $posts = Post::all();
        $users = User::all();

        return back()
            ->with(['posts' => $posts, 'users' => $users])
            ->with('msg', 'Postado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //..recupera o post e usuário que fez esta postagem da base de dados
        $post = Post::find($id);

        // Se a postagem não existe o $user vai receber null para que seja informado que a postagem foi deletada
        if ($post) {
            $user = User::find($post->user_id);
        } else {
            $post = "Postagem deletada.";
            $user = null;
        }

        $posts = Post::all();
        $users = User::all();
        $route = Route::current();
        $routeName = $route->getName();

        return view('posts.show')
                ->with([
                    'post' => $post,
                    'user' => $user,
                    'posts' => $posts,
                    'users' => $users,
                    'routeName' => $routeName
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //..recupera o post da base de dados
        $post = Post::find($id);

        $route = Route::current();
        $routeName = $route->getName();

        //..se encontrar o post, retorna a view de edição com com o objeto correspondente
        if ($post) {
            return view('posts.edit')->with([
                'post' => $post,
                'routeName' => $routeName,
                'sucesso-editar' => 'Feito, o texto foi editado.'
            ]);
        } else {
            //..senão, retorna a view de edição com uma mensagem que será exibida.
            $posts = Post::all();
            return view('posts.edit')->with([
                'post' => $post,
                'routeName' => $routeName,
                'erro-editar' => 'Erro, não foi possível editar.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //..recupera o post mediante o id
        $post = Post::find($id);

        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $post->post = $request->input('post');

        //..persite as alterações na base de dados
        $post->save();
        
        //..retorna a view index com uma mensagem
        $posts = Post::all();

        // return view('posts.index')
        return back()
            ->with('posts', $posts)
            ->with('msg', 'Postagem atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $post = Post::find($id);
        $users = User::all();
        $route = Route::current();
        $routeName = $route->getName();

        // dd($id);
        $urlAtual = URL::full();

        //..exclui o recurso
        $post->delete();
        //..retorna à view index.
        $posts = Post::all();

        return redirect('/posts')
            ->with(['posts' => $posts, 'routeName' => $routeName, 'users' => $users])
            ->with(['excluir-postagem', 'Postagem excluída.']);
    }
}
