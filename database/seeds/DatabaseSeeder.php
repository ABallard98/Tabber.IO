<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ArtistTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SongTableSeeder::class);
    }
}
