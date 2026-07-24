<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Superadmin',
                'email' => 'tayo@gmail.com',
                'password' => 'tayo@gmail.com',
                'role' => 'Superadmin',
            ], //TE QUIERO MUUUCHO MUUUUCHO AMORCITO DE MI VIDA PORFAVOR QUIERO LA CÁBALA
            [
                'name' => 'Administrador',
                'email' => 'yota@gmail.com',    
                'password' => 'yota@gmail.com',
                'role' => 'Administrador',
            ],
            [
                'name' => 'Recepcionista',
                'email' => 'recepcion@gmail.com',
                'password' => 'recepcion@gmail.com',
                'role' => 'Recepcionista',
            ],
            [
                'name' => 'Profesor',
                'email' => 'profesor@gmail.com',
                'password' => 'profesor@gmail.com',
                'role' => 'Profesor',
            ],
        ];

        foreach ($users as $data) {

            $user = User::updateOrCreate(
                ['email' => $data['email']],
                [
                    'academia_id' => 1,
                    'name'         => $data['name'],
                    'password'     => Hash::make($data['password']),
                    'activo'       => true,
                ]
            );

            $user->syncRoles([$data['role']]);
        }
    }
}
