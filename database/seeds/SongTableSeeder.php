<?php

use App\Song;
use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $newSong = new Song;
        $newSong->title = "Amazing Grace";
        $newSong->fileName = "amazinggrace.gp5";
        $newSong->artist = "Tommy Emmanuel";
        $newSong->save();

        $newSong = new Song;
        $newSong->title = "Everytime";
        $newSong->fileName = "everytime.gp5";
        $newSong->artist = "Sungha Jung";
        $newSong->save();

        $newSong = new Song;
        $newSong->title = "All I want for Christmas";
        $newSong->fileName = "alliwant.gp5";
        $newSong->artist = "Sungha Jung";
        $newSong->save();

        $newSong = new Song;
        $newSong->title = "Milkyway";
        $newSong->fileName = "milkyway.gp5";
        $newSong->artist = "Sungha Jung";
        $newSong->save();

        $newSong = new Song;
        $newSong->title = "Canon";
        $newSong->fileName = "Canon.gp5";
        $newSong->artist = "Pachelbel";
        $newSong->save();

        $newSong = new Song;
        $newSong->title = "Unravel (Tokyo Ghoul)";
        $newSong->fileName = "unravel.gp5";
        $newSong->artist = "Sungha Jung";
        $newSong->save();

        $newSong = new Song;
        $newSong->title = "Viva La Vida";
        $newSong->fileName = "vivaladvida.gp5";
        $newSong->artist = "Coldplay";
        $newSong->save();

    }
}
