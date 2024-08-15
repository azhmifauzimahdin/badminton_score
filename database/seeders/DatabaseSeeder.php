<?php

namespace Database\Seeders;

use App\Models\Fight;
use App\Models\Gallery;
use App\Models\Player;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'afm-app@gmail.com',
            'password' => Hash::make('P@ssw0rd')
        ]);

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
            'startdate' => '2024-08-18 19:00:00'
        ]);
        Fight::create([
            'playeroneid' => 3,
            'playertwoid' => 4,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 19:30:00'
        ]);
        Fight::create([
            'playeroneid' => 5,
            'playertwoid' => 6,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 20:00:00'
        ]);
        Fight::create([
            'playeroneid' => 7,
            'playertwoid' => 8,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 20:30:00'
        ]);
        Fight::create([
            'playeroneid' => 9,
            'playertwoid' => 8,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 21:00:00'
        ]);
        Fight::create([
            'playeroneid' => 16,
            'playertwoid' => 17,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 21:30:00'
        ]);
        Fight::create([
            'playeroneid' => 10,
            'playertwoid' => 11,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 22:00:00'
        ]);
        Fight::create([
            'playeroneid' => 12,
            'playertwoid' => 13,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 22:30:00'
        ]);
        Fight::create([
            'playeroneid' => 14,
            'playertwoid' => 15,
            'venue' => 'Mertakanda Hall',
            'startdate' => '2024-08-18 23:00:00'
        ]);

        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'galery1.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://cc-prod.scene7.com/is/image/CCProdAuthor/product-photography_P3B_720x350?$pjpeg$&jpegSize=200&wid=720'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSG9YAJBxbFPrjI5u4Dy9oHDY0Pwswv4xYmSg&usqp=CAU'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://i.pinimg.com/736x/2f/03/47/2f0347d14901bb9fa7003c37ff7df8f0.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://plazakamera.com/wp-content/uploads/2017/11/629c51d7a80801ef5ecff9398a4c9d6a-product-photography-lighting-shape-photography.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://www.itb.ac.id/files/dokumentasi/1602643049-ilustrasi---product.png'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://img.freepik.com/free-photo/skin-products-arrangement-wooden-blocks_23-2148761445.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://photography.serviamo.id/wp-content/uploads/2021/03/chandra-oh-yuvFnxtHE_g-unsplash-scaled-1.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZfJ4j7UxD1hdivtPjxc-4OyAyu-DVFPIGWw&usqp=CAU'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://cc-prod.scene7.com/is/image/CCProdAuthor/product-photography_P3B_720x350?$pjpeg$&jpegSize=200&wid=720'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSG9YAJBxbFPrjI5u4Dy9oHDY0Pwswv4xYmSg&usqp=CAU'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://i.pinimg.com/736x/2f/03/47/2f0347d14901bb9fa7003c37ff7df8f0.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://plazakamera.com/wp-content/uploads/2017/11/629c51d7a80801ef5ecff9398a4c9d6a-product-photography-lighting-shape-photography.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://www.itb.ac.id/files/dokumentasi/1602643049-ilustrasi---product.png'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://img.freepik.com/free-photo/skin-products-arrangement-wooden-blocks_23-2148761445.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://photography.serviamo.id/wp-content/uploads/2021/03/chandra-oh-yuvFnxtHE_g-unsplash-scaled-1.jpg'
        // ]);
        // Gallery::create([
        //     'description' => 'Mantap Jiwa',
        //     'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZfJ4j7UxD1hdivtPjxc-4OyAyu-DVFPIGWw&usqp=CAU'
        // ]);
    }
}
