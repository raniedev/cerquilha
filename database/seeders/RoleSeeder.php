<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $prof = Role::create(['name' => 'prof']);
        $aluno = Role::create(['name' => 'aluno']);
        Role::create(['name' => 'bloqueado']);

        $criar_postagens = Permission::create(['name' => 'criar_postagens']);
        $interagir_postagens = Permission::create(['name' => 'interagir_postagens']);
        $interagir_videos = Permission::create(['name' => 'interagir_videos']);
        $enviar_videos = Permission::create(['name' => 'enviar_videos']);
        $mudar_cargo = Permission::create(['name' => 'mudar_cargo']);
        $excluir_usuario = Permission::create(['name' => 'excluir_usuario']);

        $admin->givePermissionTo([
            $criar_postagens,
            $interagir_postagens,
            $interagir_videos,
            $enviar_videos,
            $mudar_cargo,
            $excluir_usuario
        ]);

        $prof->givePermissionTo([
            $criar_postagens,
            $interagir_postagens,
            $interagir_videos,
            $enviar_videos
        ]);

        $aluno->givePermissionTo([
            $criar_postagens,
            $interagir_postagens,
            $interagir_videos
        ]);
    }
}
