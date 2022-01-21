<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'DGarita',
            'email' => 'mail@mail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://dgarita.xyz'
        ]);
        //$user->perfil()->create();

        $user2 = User::create([
            'name' => 'Andres',
            'email' => 'mail2@mail.com',
            'password' => Hash::make('12345678'),
            'url' => 'http://dgarita.xyz'
        ]);
        //$user2->perfil()->create();
        

       
    }
}

