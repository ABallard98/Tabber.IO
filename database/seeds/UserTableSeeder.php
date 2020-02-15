<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Ayden";
        $user->email = "ayden.ballard@Gmail.com";
        $user->password = "123123";
        $user->save();

    }
}
