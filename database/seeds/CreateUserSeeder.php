<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'mohamed_Ali', 
            'email' => 'test@test.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
