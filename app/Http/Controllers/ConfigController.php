<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ConfigController extends Controller
{
    public function index()
    {        
        $route = Route::current();
        $routeName = $route->getName();

        return view('configs.index')->with([
            'routeName' => $routeName
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //..recupera as configs da base de dados
        $config = Config::find($id);

        //..se encontrar as configs, retorna a view de edição com o objeto correspondente
        if ($config) {
            return view('configs.edit')->with('config', $config);
        } else {
            //..senão, retorna a view de edição com uma mensagem que será exibida.
            $configs = Config::all();
            return view('configs.index')->with('configs', $configs)
                ->with('msg', 'Veículo não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        
        // obter o usuário pelo ID
        $user = User::findOrFail($id);

        if ($request->has('trocar-foto')) {

            $mensagens = [
                'imagem.mimes' => 'A imagem deve estar no formato jpeg, png ou jpg.',
                'imagem.max' => 'A imagem deve ter no máximo 2MB.',
                'imagem.required' => 'Nenhuma imagem foi selecionada.'
            ];
    
            $validator = Validator::make($request->all(), [
                'imagem' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ], $mensagens);

            // Se tiver erros volta e mostra a mensagem correspondente
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }
    
            $extension = $request->file('imagem')->getClientOriginalExtension();

            // atualizar a foto
            // remover a foto antiga, se houver
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
    
            // salvar a nova foto
            $avatar = $request->file('imagem')->storeAs('public/images/usuarios', $user->username.'.'.$extension);

            // trocar o public por storage para conseguir o acesso depois do link
            // que foi feito pelo php artisan storage:link
            $path = str_replace('public', 'storage', $avatar);
            $user->avatar = $path;

            $user->save();
            return redirect()->back()->with('sucesso-imagem', 'Imagem atualizada com sucesso.');

        } else if($request->has('trocar-dados')){
            $mensagens = [
                'nome.required' => 'O campo nome não pode ser vazio',
                'nome.regex' => 'O campo nome deve ser único, não utilize espaços, para adicionar o sobrenome use o campo correspondente.',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve ter no máximo 32 caracteres.',
                'nome.required' => 'O campo sobrenome não pode ser vazio',
                'nome.max' => 'O campo sobrenome deve ter no máximo 32 caracteres.',
                'nome.required' => 'O campo sobrenome não pode ser vazio',
                'nome.max' => 'O campo sobrenome deve ter no máximo 32 caracteres.',
                'usuario.regex' => 'O usuário deve ter apenas letras, números, ponto(.) e sublinhado(_)',
                'usuario.unique' => 'Esse usuário já está sendo utilizado, escolha outro.'
            ];
    
            $validator = Validator::make($request->all(), [
                'nome' => 'required|min:3|max:32|regex:/^[^\s]+$/',
                'sobrenome' => 'required|max:32',
                'usuario' => [
                'required',
                'max:32',
                'regex:/^[a-zA-Z0-9._]*$/',
                Rule::unique('users', 'username')->ignore($user->id)]
            ], $mensagens);

            // Se tiver erros volta e mostra a mensagem correspondente
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }

            $user->name = $request->input('nome');
            $user->lastname = $request->input('sobrenome');
            $user->username = $request->input('usuario');

            if($request->input('genero') !== null) {
                $user->gender = $request->input('genero');
            }

            if($request->input('data') !== null) {
                $user->birthday = $request->input('data');
            }

            $user->save();
            return redirect()->back()->with('sucesso-dados', 'Dados atualizado com sucesso.');
        } else if($request->has('trocar-senha')){            

            $mensagens = [
                'nova_senha.required' => 'O campo [Nova Senha] é obrigatório.',
                'nova_senha.min' => 'O campo [Nova Senha] deve ter mínimo :min caracteres.',
                'nova_senha.regex' => 'O campo [Nova Senha] deve conter pelo menos uma letra minúscula, uma letra maiúscula e um número.',
                'nova_senha.confirmed' => 'Os campos [Nova Senha] e [Repetir Nova Senha] são diferentes.',
                'nova_senha_confirmation.required' => 'O campo [Repetir Nova Senha] é obrigatório.',
                'nova_senha_confirmation.min' => 'O campo [Repetir Nova Senha] deve ter mínimo :min caracteres.',
                'nova_senha_confirmation.regex' => 'O campo [Repetir Nova Senha] deve conter pelo menos uma letra minúscula, uma letra maiúscula e um número.'
            ];
    
            $validator = Validator::make($request->all(), [
                'nova_senha' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
                    'confirmed'
                ],
                'nova_senha_confirmation' => [
                    'required',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'
                ]
            ], $mensagens);

            // Se tiver erros volta e mostra a mensagem correspondente
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }

            if (Hash::check($request->input('senha_atual'), $user->password)) {
                // a senha atual é válida
                // echo "Senha igual do DB <br>";
                // echo $user->password . '<br>';
                // echo $request->input('senha_atual') . '<br>';
                // echo $request->input('nova_senha') . '<br>';
                // echo Hash::make($request->input('nova_senha_confirmation')) . '<br>';

                $user->password = Hash::make($request->input('nova_senha'));

                $user->save();
                return redirect()->back()->with('sucesso-senha', 'Senha alterada com sucesso.');
            } else {
                // a senha atual é inválida

                $condicao = true;

                $mensagens = [
                    'senha_atual.required' => 'O campo [Senha Atual] é obrigatório.'
                ];
        
                $validator = Validator::make($request->all(), [
                    'senha_atual' => [
                        'required',
                        function ($attribute, $value, $fail) use ($condicao) {
                            if ($condicao) {
                                $fail('O campo [Senha Atual] é inválido.');
                            }
                        }
                    ]
                ], $mensagens);
    
                // Se tiver erros volta e mostra a mensagem correspondente
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator->messages())->withInput();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
