<?php

namespace App\Http\Controllers;
use App\Models\SiteStyle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
use App\Models\Follower;

class LayoutController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // Usuário autenticado
        } else {
            return redirect('/');
        }

        $userId = Auth::id(); // obtém o id do usuário logado
        $siteStyle = SiteStyle::where('user_id', $userId)->first(); // obtém o registro do site_style do usuário logado

        $posts = Post::all();
        $results = Post::join('users', 'posts.user_id', '=', 'users.id')
                ->join('followers', 'posts.user_id', '=', 'followers.user_id')
                ->where('followers.follower_id', '=', $userId)
                ->select('posts.*', 'users.name', 'users.lastname', 'users.username', 'users.email', 'users.avatar')
                ->unionAll(
                    Post::join('users', 'posts.user_id', '=', 'users.id')
                        ->where('posts.user_id', '=', $userId)
                        ->select('posts.*', 'users.name', 'users.lastname', 'users.username', 'users.email', 'users.avatar')
                )->get();

        $users = User::all();
        $followers = Follower::all();

        $route = Route::current();
        $routeName = $route->getName();

        $request = Request::capture();
        $currentPath = $request->path();

        session(['currentPath' => $currentPath]);
        session(['routeName' => $routeName]);
        session(['siteStyle' => $siteStyle]);
        session(['posts' => $posts]);
        session(['users' => $users]);
        session(['followers' => $followers]);
        session(['results' => $results]);

        switch($currentPath) {
            case 'admin':
                return view('admin', compact('siteStyle', 'routeName'));
                break;
            case 'home':
                return view('home', compact('siteStyle', 'routeName', 'followers', 'posts', 'users', 'results'));
                break;
            case 'posts':
                return view('posts', compact('siteStyle', 'routeName'));
                break;
            case 'search':
                return view('search', compact('siteStyle', 'routeName'));
                break;
            case 'estudar':
                return view('estudar', compact('siteStyle', 'routeName'));
                break;
            case 'videos':
                return view('videos', compact('siteStyle', 'routeName'));
                break;
            case 'configs':
                return view('configs', compact('siteStyle', 'routeName'));
                break;
            default:
                echo 'Erro, nome da rota não encontrando';
        }
    }

    public function update(Request $request, string $id) {

        $style = SiteStyle::find($id);

        $style->font_size = $request->input('custom_fonte');
        $style->main_color = $request->input('custom_cor');
        $style->theme = $request->input('custom_tema');

        $userId = Auth::id(); // obtém o id do usuário logado
        $siteStyle = SiteStyle::where('user_id', $userId)->first(); // obtém o registro do site_style do usuário logado

        $route = Route::current();
        $routeName = $route->getName();

        // dd($style);
        session(['routeName' => $routeName]);
        session(['siteStyle' => $siteStyle]);

        $style->save();
        
        view()->share('siteStyle', $siteStyle);
        view()->share('routeName', $routeName);

        // return redirect('/home')->with('sucesso-estilo', 'Feito, tema modificado.')->with('timestamp', time());
        return back()
            ->with('sucesso-estilo', 'Feito, tema modificado.');
    }
}
