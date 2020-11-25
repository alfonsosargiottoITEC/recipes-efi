<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
        'name' => 'SuperAdmin',
        'email' => 'superadmin@itecriocuarto.org.ar',
        'email_verified_at' => now(),
        'password' => bcrypt('efi2020laravel'), // password
        'remember_token' => Str::random(10),
        'role_id'=>1,
        ]);
    }
}
