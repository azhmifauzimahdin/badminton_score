<?php

namespace Database\Seeders;

use App\Models\Fight;
use App\Models\Gallery;
use App\Models\Player;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Player::create([
            'name' => 'Ushi',
            'image' => 'usi.png'
        ]);
        Player::create([
            'name' => 'Maul',
            'image' => 'maul.png'
        ]);
        Player::create([
            'name' => 'Ica',
            'image' => 'ica.png'
        ]);
        Player::create([
            'name' => 'Windi',
            'image' => 'windi.png'
        ]);
        Player::create([
            'name' => 'Sidul',
            'image' => 'playerdefault1.png'
        ]);
        Player::create([
            'name' => 'Ewin',
            'image' => 'playerdefault1.png'
        ]);
        Player::create([
            'name' => 'Gedor',
            'image' => 'playerdefault1.png'
        ]);
        Player::create([
            'name' => 'Epung',
            'image' => 'playerdefault1.png'
        ]);
        Player::create([
            'name' => 'Apim',
            'image' => 'playerdefault1.png'
        ]);

        Player::create([
            'name' => 'Windi & Gedor',
            'image' => 'playerdoubledefault.png'
        ]);
        Player::create([
            'name' => 'Ushi & Epung',
            'image' => 'playerdoubledefault.png'
        ]);
        Player::create([
            'name' => 'Maul & Ewin',
            'image' => 'playerdoubledefault.png'
        ]);
        Player::create([
            'name' => 'Sidul & Ica',
            'image' => 'playerdoubledefault.png'
        ]);
        Player::create([
            'name' => 'Ewin & Ica',
            'image' => 'playerdoubledefault.png'
        ]);
        Player::create([
            'name' => 'Apim & Maul',
            'image' => 'playerdoubledefault.png'
        ]);

        Player::create([
            'name' => 'Ushi & Ica',
            'image' => 'ushiica.png'
        ]);
        Player::create([
            'name' => 'Windi & Maul',
            'image' => 'windimaul.png'
        ]);

        Fight::create([
            'playeroneid' => 1,
            'playertwoid' => 2,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 19:00:00'
        ]);
        Fight::create([
            'playeroneid' => 3,
            'playertwoid' => 4,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 19:30:00'
        ]);
        Fight::create([
            'playeroneid' => 5,
            'playertwoid' => 6,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 20:00:00'
        ]);
        Fight::create([
            'playeroneid' => 7,
            'playertwoid' => 8,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 20:30:00'
        ]);
        Fight::create([
            'playeroneid' => 9,
            'playertwoid' => 8,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 21:00:00'
        ]);
        Fight::create([
            'playeroneid' => 16,
            'playertwoid' => 17,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 21:30:00'
        ]);
        Fight::create([
            'playeroneid' => 10,
            'playertwoid' => 11,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 22:00:00'
        ]);
        Fight::create([
            'playeroneid' => 12,
            'playertwoid' => 13,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 22:30:00'
        ]);
        Fight::create([
            'playeroneid' => 14,
            'playertwoid' => 15,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 23:00:00'
        ]);
        Fight::create([
            'playeroneid' => 1,
            'playertwoid' => 3,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-11 11:00:00'
        ]);

        Gallery::create([
            'description' => 'Mantap Jiwa',
            'image' => 'galery1.jpg'
        ]);
        Gallery::create([
            'description' => 'Mantap Jiwa',
            'image' => 'galery1.jpg'
        ]);
        Gallery::create([
            'description' => 'Mantap Jiwa',
            'image' => 'galery1.jpg'
        ]);
        Gallery::create([
            'description' => 'Mantap Jiwa',
            'image' => 'galery1.jpg'
        ]);
        Gallery::create([
            'description' => 'Mantap Jiwa',
            'image' => 'galery1.jpg'
        ]);
        Gallery::create([
            'description' => 'Mantap Jiwa',
            'image' => 'galery1.jpg'
        ]);
    }
}
