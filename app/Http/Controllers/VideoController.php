<?php

namespace App\Http\Controllers;

use App\Models\LikeVideo;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Question;
use App\Models\User;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //..recuperando os vídeos do banco de dados
        $users = User::all();
        $route = Route::current();
        $questions = Question::all();
        $like_videos = LikeVideo::all();
        $routeName = $route->getName();
        $materia = request('materia');

        switch($materia) {
            case 'Português':
                $videos = Video::where('discipline', 'Português')->get();
                break;
            case 'Inglês':
                $videos = Video::where('discipline', 'Inglês')->get();
                break;
            case 'Espanhol':
                $videos = Video::where('discipline', 'Espanhol')->get();
                break;
            case 'Matemática':
                $videos = Video::where('discipline', 'Matemática')->get();
                break;
            case 'Geometria':
                $videos = Video::where('discipline', 'Geometria')->get();
                break;
            case 'Física':
                $videos = Video::where('discipline', 'Física')->get();
                break;
            case 'Química':
                $videos = Video::where('discipline', 'Química')->get();
                break;
            case 'Biologia':
                $videos = Video::where('discipline', 'Biologia')->get();
                break;
            case 'História':
                $videos = Video::where('discipline', 'História')->get();
                break;
            case 'Geografia':
                $videos = Video::where('discipline', 'Geografia')->get();
                break;
            case 'História':
                $videos = Video::where('discipline', 'História')->get();
                break;
            case 'Geografia':
                $videos = Video::where('discipline', 'Geografia')->get();
                break;
            case 'Música':
                $videos = Video::where('discipline', 'Música')->get();
                break;
            case 'Filosofia':
                $videos = Video::where('discipline', 'Filosofia')->get();
                break;
            case 'Sociologia':
                $videos = Video::where('discipline', 'Sociologia')->get();
                break;
            case 'Informática':
                $videos = Video::where('discipline', 'Informática')->get();
                break;
            case 'Artes':
                $videos = Video::where('discipline', 'Artes')->get();
                break;
            default:
                $videos = Video::all();
        }
        
        //..retorna a view index passando a variável $videos
        return view('videos.index')->with([
            'users' => $users,
            'videos' => $videos,
            'routeName' => $routeName,
            'materia' => $materia,
            'questions' => $questions,
            'like_videos' => $like_videos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videos = Video::all();
        $users = User::all();
        $route = Route::current();
        $routeName = $route->getName();
        
        //..mostrando o formulário de cadastro
        return view('videos.create')->with([
            'users' => $users,
            'videos' => $videos,
            'routeName' => $routeName
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('video'));

        //..instancia um novo model Video
        $video = new Video();
        $user = User::where('id', $request->input('usuario_id'))->first();
        $usuario = $user->username;

        //..pega os dados vindos do form e seta no model
        $video->user_id = $request->input('usuario_id');
        $video->title = $request->input('titulo');
        $video->description = $request->input('descricao');
        $video->discipline = $request->input('materia');
        $video->class = $request->input('turma');
        $video->internal = $request->input('interno');

        if ($request->input('interno') == 1) {
            $file = $request->file('video');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename = $originalName . '_' . time() . '.' . $extension;
            $path = $file->storeAs('public/videos/'.$usuario , $filename);
            $caminho = str_replace('public', 'storage', $path);
            $video->video = $caminho;
        } else {
            $video->video = $request->input('video');
        }

        //..persiste o model na base de dados
        $video->save();
        //..retorna a view com uma variável msg que será tratada na própria view
        $videos = Video::all();
        return back()->with('videos', $videos)
            ->with('sucesso-criar-video', 'Vídeo cadastrado com sucesso!');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //..recupera o vídeo da base de dados
        $video = Video::find($id);
        $route = Route::current();
        $questions = Question::all();
        $routeName = $route->getName();
        $users = User::all();
        $like_videos = LikeVideo::all();

        //..se encontrar o vídeo, retorna a view com o objeto correspondente
        if ($video) {
            return view('videos.show')->with([
                'like_videos' => $like_videos,
                'questions' => $questions,
                'video' => $video,
                'users' => $users,
                'routeName' => $routeName
            ]);
        } else {
            //..senão, retorna a view com uma mensagem que será exibida.
            return view('videos.show')->with('msg', 'Vídeo não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        //..recupera o veículo da base de dados
        $video = Video::find($id);
        $route = Route::current();
        $routeName = $route->getName();

        //..se encontrar o veículo, retorna a view de edição com com o objeto correspondente
        if ($video) {
            return view('videos.edit')->with([
                'video' => $video,
                'routeName' => $routeName
            ])->with('sucesso-editar-video', 'Vídeo editado com sucesso!');
        } else {
            $materia = null;
            //..senão, retorna a view de edição com uma mensagem que será exibida.
            $videos = Video::all();
            return view('videos.edit')->with([
                'videos' => $videos,
                'routeName' => $routeName
                ])->with('erro-encontrar-video', 'Vídeo não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);

        //..recupera o vídeo mediante o id
        $video = Video::find($id);

        //..atualiza os atributos do objeto recuperado com os dados do objeto Request
        $video->title = $request->input('titulo');
        $video->description = $request->input('descricao');
        $video->class = $request->input('turma');
        $video->discipline = $request->input('materia');

        // Checar se tem Link ou não
        if($request->exists('link')){
            $video->video = $request->input('link');
        }

        //..persite as alterações na base de dados
        $video->save();
        //..retorna a view index com uma mensagem
        $videos = Video::all();
        return back()->with('videos', $videos)
            ->with('sucesso-atualizar-video', 'Vídeo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $video = Video::find($id);
        $materia = null;
        //..exclui o recurso
        $video->delete();
        //..retorna à view index.
        $videos = Video::all();
        return redirect('/videos')->with([
            'videos' => $videos,
            'materia' => $materia
            ])->with('sucesso-excluir-video', "Vídeo excluído com sucesso!");
    }

    public function comment(Request $request) {
        // dd($request);

        $question = new Question();
        $question->user_id = $request->user()->id;
        $question->video_id = $request->input('id_video');
        $question->post = $request->input('post');
        $video = Video::find($request->input('id_video'));

        if ($request->resposta == null) {
            $question->answer == null;
        } else {
            $question->answer = $request->input('resposta');
        }

        $question->save();

        $questions = Question::all();
        $users = User::all();

        return back()
            ->with(['video' => $video, 'question' => $questions, 'users' => $users])
            ->with('msg', 'Postado com sucesso!');
    }

    public function like(Request $request) {
        $like = new LikeVideo();
        $like->user_id = auth()->id();
        $like->post_id = $request->post_id;
        $like->save();

        return response()->json(['success' => true]);
    }
}
