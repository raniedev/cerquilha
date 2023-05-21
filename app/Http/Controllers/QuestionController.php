<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Question;
use App\Models\Like;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class QuestionController extends Controller
{
    public function destroy(string $id)
    {
        //..recupeara o recurso a ser excluído
        $question = Question::find($id);
        $users = User::all();
        $route = Route::current();
        $routeName = $route->getName();
        
        $urlAtual = URL::full();

        //..exclui o recurso
        $question->delete();
        //..retorna à view index.
        $questions = Question::all();

        return back()
            ->with(['questions' => $questions, 'routeName' => $routeName, 'users' => $users])
            ->with(['excluir-postagem', 'Postagem excluída.']);
    }
}
