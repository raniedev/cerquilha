<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SiteStyle;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {                
        // TRATAMENTO DE ERRO: Checar se as senhas batem
        if($request->senha == $request->repetir_senha){

            // TRATAMENTO DE ERRO: Checar se regex estabelecido foi cumprido 
            // (8 caracteres, ao menos 1 letra maiúscula, minúscula e número)
            if (preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', $request->senha)) {

                // TRATAMENTO DE ERRO: Checar se o email e usuário/username já foram registrados
                $emailJaExiste = User::where('email', $request->email)->first();
                $usuarioJaExiste = User::where('username', $request->usuario)->first();
                
                // Se tiver algum erro a respeito do usuário ou email
                if($emailJaExiste || $usuarioJaExiste) {
                    if(($emailJaExiste != null) && ($usuarioJaExiste != null)) {
                        return redirect(RouteServiceProvider::REGISTER)
                        ->with('erro-email', 'Erro, email')
                        ->with('erro-usuario', 'e usuário já foram registrados.')->withInput();
                    } else if (($emailJaExiste == null) && ($usuarioJaExiste != null)) {
                        return redirect(RouteServiceProvider::REGISTER)
                        ->with('erro-usuario', 'Erro, este usuário já foi registrado.')->withInput();
                    } else if (($emailJaExiste != null) && ($usuarioJaExiste == null)){
                        return redirect(RouteServiceProvider::REGISTER)
                        ->with('erro-email', 'Erro, este email já foi registrado.')->withInput();
                    } else {
                        echo "Erro, tratamento de erro no registro do usuário inesperado.";
                    }
                } else {
                    // Se não tiver nenhum erro, cria novo usuário
                    $user = User::create([
                        'name' => $request->nome,
                        'lastname' => $request->sobrenome,
                        'username' => $request->usuario,
                        'email' => $request->email,
                        'email_verified' => false,
                        'password' => Hash::make($request->senha),
                        'google_id' => NULL,
                        'avatar' => "/images/default.png",
                        'gender' => $request->genero,
                        'birthday' => $request->data_nasc
                    ])->assignRole('aluno');
            
                    event(new Registered($user));

                    $siteStyle = SiteStyle::create([
                        'font_size' => 14,
                        'main_color' => 'agua',
                        'theme' => 'diurno',
                        'user_id' => $user->id
                    ]);

                    event(new Registered($siteStyle));
            
                    Auth::login($user);
                    
                    return redirect(RouteServiceProvider::HOME);
                }
            
            } else {
                return redirect(RouteServiceProvider::REGISTER)
                    ->with('erro-senha-regex', 'Erro, a senha precisa ter 8 caracteres e ao menos 1 letra maiúscula, minúscula e número.')->withInput();
            }
        } else {
            return redirect(RouteServiceProvider::REGISTER)
                ->with('erro-senha-diferente', 'Erro, o campo senha e repetir senha são diferentes.')->withInput();
        }
    }
}
