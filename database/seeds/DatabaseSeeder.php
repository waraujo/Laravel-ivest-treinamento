<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        User::create([
            'cpf' => '07341215',
            'nome' => 'alexandro tiago de oliveira1',
            'phone' => '45999788593',
            'gender' => 'M',
            'notes' => 'teste',
            'email' => 'alexandro.t.@gmail.com',
            'password' => env('PASSWORD_HASH')? bcrypt('A1l2e3x4'):'A1l2e3x4',
            'status' => 'ativo',
            'permission' => 'sim',
        ]);
    }
}
