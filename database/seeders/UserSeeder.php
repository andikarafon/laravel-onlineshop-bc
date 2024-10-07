<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(9)->create();

        \App\Models\User::create([
            'name' => 'Andika Rafon Sinuhaji',
            'email' => 'andika@wonokoyo.co.id',
            'email_verified_at' => now(),
            'password' => Hash::make('230557'),
            'phone' => '081234567890',
            'remember_token' => Str::random(10),
        ]);
    }
}
