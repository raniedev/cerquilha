<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Like;
use App\Models\Question;
use App\Models\LikeVideo;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\SiteStyle;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $route = Route::current();
        $routeName = $route->getName();

        $roles = Role::all();
        $permissions = Permission::all();

        $posts = Post::all();
        $users = User::all();
        $videos = Video::all();
        $site_style = SiteStyle::all();
        $likes = Like::all();
        $like_videos = LikeVideo::all();
        $followers = Follower::all();
        $questions = Question::all();
        $unique_seguidores = $followers->pluck('follower_id')->unique()->toArray();
        $unique_seguidos = $followers->pluck('user_id')->unique()->toArray();

        $counts_a = $followers->pluck('user_id')->countBy()->toArray();
        arsort($counts_a); // Classificar o array em ordem decrescente pelos valores
        $top_seguidos = array_slice($counts_a, 0, 10, true); // Obter os 10 primeiros elementos

        $counts_b = $followers->pluck('follower_id')->countBy()->toArray();
        arsort($counts_b); // Classificar o array em ordem decrescente pelos valores
        $top_seguem = array_slice($counts_b, 0, 10, true); // Obter os 10 primeiros elementos

        $counts_c = $like_videos->pluck('video_id')->countBy()->toArray();
        arsort($counts_c); // Classificar o array em ordem decrescente pelos valores
        $top_like_videos = array_slice($counts_c, 0, 10, true); // Obter os 10 primeiros elementos

        $counts_d = $questions->pluck('video_id')->countBy()->toArray();
        arsort($counts_d); // Classificar o array em ordem decrescente pelos valores
        $top_duvida_videos = array_slice($counts_d, 0, 10, true); // Obter os 10 primeiros elementos

        $counts_e = $posts->pluck('parent_id')->countBy()->toArray();
        arsort($counts_e); // Classificar o array em ordem decrescente pelos valores
        $top_postagem_comentarios = array_slice($counts_e, 0, 10, true); // Obter os 10 primeiros elementos

        $counts_f = $likes->pluck('post_id')->countBy()->toArray();
        arsort($counts_f); // Classificar o array em ordem decrescente pelos valores
        $top_postagem_curtidas = array_slice($counts_f, 0, 10, true); // Obter os 10 primeiros elementos

        return view('admin.index')->with([
            'routeName' => $routeName,
            'roles' => $roles,
            'posts' => $posts,
            'users' => $users,
            'videos' => $videos,
            'questions' => $questions,
            'site_style' => $site_style,
            'likes' => $likes,
            'like_videos' => $like_videos,
            'followers' => $followers,
            'unique_seguidores' => $unique_seguidores,
            'unique_seguidos' => $unique_seguidos,
            'top_seguidos' => $top_seguidos,
            'top_seguem' => $top_seguem,
            'top_like_videos' => $top_like_videos,
            'top_duvida_videos' => $top_duvida_videos,
            'top_postagem_comentarios' => $top_postagem_comentarios,
            'top_postagem_curtidas' => $top_postagem_curtidas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->has('mudar-cargo')) {
            $user = User::where('id', $id)->first();

            // dd($user);

            if ($request->roles == 'admin') {
                $role_admin = Role::where('name', 'admin')->first();
                $user->syncRoles([$role_admin]);
            } else if ($request->roles == 'prof'){
                $role_prof = Role::where('name', 'prof')->first();
                $user->syncRoles([$role_prof]);
            } else if (($request->roles == 'aluno')) {
                $role_aluno = Role::where('name', 'aluno')->first();
                $user->syncRoles([$role_aluno]);
            } else if (($request->roles == 'bloqueado')) {
                $role_bloqueado = Role::where('name', 'bloqueado')->first();
                $user->syncRoles([$role_bloqueado]);
            }

            return redirect()->back();
        }


        if($request->has('prof-submit')) {

            // Colocar ou Remover o criar_postagens do Professor
            if ($request->has('prof_criar_postagens')) {
                $permission = Permission::where('name', 'criar_postagens')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->givePermissionTo($permission);
                }
            } else {
                $permission = Permission::where('name', 'criar_postagens')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->revokePermissionTo($permission);
                }
            }

            // Colocar ou Remover o interagir_postagens do Professor
            if ($request->has('prof_interagir_postagens')) {
                $permission = Permission::where('name', 'interagir_postagens')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->givePermissionTo($permission);
                }
            } else {
                $permission = Permission::where('name', 'interagir_postagens')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->revokePermissionTo($permission);
                }
            }

            // Colocar ou Remover o interagir_videos do Professor
            if ($request->has('prof_interagir_videos')) {
                $permission = Permission::where('name', 'interagir_videos')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->givePermissionTo($permission);
                }
            } else {
                $permission = Permission::where('name', 'interagir_videos')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->revokePermissionTo($permission);
                }
            }

            // Colocar ou Remover o enviar_videos do Professor
            if ($request->has('prof_enviar_videos')) {
                $permission = Permission::where('name', 'enviar_videos')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->givePermissionTo($permission);
                }
            } else {
                $permission = Permission::where('name', 'enviar_videos')->first();
                $role = Role::where('name', 'prof')->first();
                if ($permission && $role) {
                    $role->revokePermissionTo($permission);
                }
            }
        } else if($request->has('aluno-submit')) {
            dd('Aluno');
        } else {
            dd('Erro');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
