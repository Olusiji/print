<?php

use Illuminate\Database\Seeder;
use App\Cover;

class CoversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cover1 = new Cover();
        $cover1->vendor_id = 3;
        $cover1->cover_type = "synthetic soft cover";
        $cover1->size_id = 2;
        $cover1->price = 100;
        $cover1->save();

        $cover2 = new Cover();
        $cover2->vendor_id = 3;
        $cover2->cover_type = "synthetic hard cover";
        $cover2->size_id = 2;
        $cover2->price = 120;
        $cover2->save();

        $cover3 = new Cover();
        $cover3->vendor_id = 3;
        $cover3->cover_type = "synthetic leather";
        $cover3->size_id = 3;
        $cover3->price = 130;
        $cover3->save();

        $cover4 = new Cover();
        $cover4->vendor_id = 3;
        $cover4->cover_type = "soft cover ruby";
        $cover4->size_id = 4;
        $cover4->price = 140;
        $cover4->save();

        $cover5 = new Cover();
        $cover5->vendor_id = 3;
        $cover5->cover_type = "basic ruby";
        $cover5->size_id = 5;
        $cover5->price = 150;
        $cover5->save();


    }
}
