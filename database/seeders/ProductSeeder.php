<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('product')->insert([
          [
              'name'=>'Oppo Mobile',
            'price'=>'20000',
            'category'=>'mobile',
            'description'=>'New Model Oppo Mobile',
            'gallery'=>'https://www.whatmobile.com.pk/admin/images/Oppo/OppoA935G-b.jpg'
        ],
        [
              'name'=>'Sumsung taplet',
            'price'=>'25000',
            'category'=>'taplet',
            'description'=>'New Model Sumsung taplet',
            'gallery'=>'https://cdn.vox-cdn.com/thumbor/irbjwwVIdSRRljcr9q7eO9UfD6g=/0x0:2040x1360/920x613/filters:focal(857x517:1183x843):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/64883752/dseifert_samsung_galaxy_tab_s6_14.0.jpg'
        ],
        [
              'name'=>'Sumsung Laptop',
            'price'=>'25000',
            'category'=>'laptop',
            'description'=>'New Model Sumsung Laptop',
            'gallery'=>'https://www.symbios.pk/image/cache/data/7/7704184023514.samsung-ativ-book-np270e5v-k01hu-500x500.jpg'
        ]
        ]);
    }
}
