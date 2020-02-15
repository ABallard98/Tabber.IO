<?php

use App\Artist;
use Illuminate\Database\Seeder;

class ArtistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newArtist = new Artist;
        $newArtist->name = "Sungha Jung";
        $newArtist->save();

        $newArtist = new Artist;
        $newArtist->name = "Tommy Emmanuel";
        $newArtist->save();

        $newArtist = new Artist;
        $newArtist->name = "Pachelbel";
        $newArtist->save();

        $newArtist = new Artist;
        $newArtist->name = "Coldplay";
        $newArtist->save();

    }
}
