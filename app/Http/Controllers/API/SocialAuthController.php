<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\SiteStyle;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    // Redirect the user to the Google authentication page.
    // @return \Illuminate\Http\Response

    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(Request $request) {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // Define o fuso horário para o Brasil/São Paulo
        date_default_timezone_set('America/Sao_Paulo');
        // Cria um objeto DateTime com a data e hora atual
        $now = new DateTime();
        // Formata a data e hora no formato desejado (exemplo: "2023-03-08 17:30:00")
        $data = $now->format('Y-m-d H:i:s');
        // Converte a data para um timestamp
        $timestamp = strtotime($data);

        // dd($user->user);

        // check if they're an existing user
        // $existingUser = User::where('email', $user->$email)->first();
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            // create a new user
            $newUser = User::create([
                'name' => $user->user['given_name'],
                'lastname' => $user->user['family_name'],
                // Criando uma conta via Google o username será o nome + timestamp do datetime atual
                'username' => strtolower($user->user['given_name']) . $timestamp,
                'email' => $user->email,
                'email_verified' => $user->user['email_verified'],
                'password' => $user->user['id'],
                'google_id' => $user->user['id'],
                'avatar' => $user->user['picture'],
                'gender' => NULL,
                'birthday' => NULL
            ])->assignRole('aluno');

            $siteStyle = SiteStyle::create([
                'font_size' => 14,
                'main_color' => 'agua',
                'theme' => 'diurno',
                'user_id' => $newUser->id
            ]);

            event(new Registered($siteStyle));

            Auth::login($newUser, true);
        }

        if ($existingUser != NULL) {
            $siteStyle = SiteStyle::where('user_id', $existingUser->id)->first();
        }

        return redirect()->to('/home')->with('siteStyle', $siteStyle);
    }
}
