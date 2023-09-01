<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    static $nome = [
        'Robs',
        'Sasa',
        'Joao',
        'Maria',
    ];

    static $email = [
        'robs@email.com',
        'sasa@email.com',
        'joao@email.com',
        'maria@email.com'
    ];

    public function run(): void
    {
        for ($i = 0; $i < count(self::$nome); $i++){
            $user = User::create([
                'name' => self::$nome[$i],
                'email' => self::$email[$i],
                'password' => Hash::make('12345678'),
            ]);
            $user->save();
        }
    }
}
