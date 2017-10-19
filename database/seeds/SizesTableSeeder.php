<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $size1 = new Size();
        $size1->size = "6by6";
        $size1->save();

        $size2 = new Size();
        $size2->size = "6by8";
        $size2->save();

        $size3 = new Size();
        $size3->size = "8by8";
        $size3->save();

        $size4 = new Size();
        $size4->size = "8by11";
        $size4->save();

        $size5 = new Size();
        $size5->size = "10by10";
        $size5->save();

        $size6 = new Size();
        $size6->size = "12by12";
        $size6->save();

        $size7 = new Size();
        $size7->size = "11by14";
        $size7->save();

        $size8 = new Size();
        $size8->size = "12by16";
        $size8->save();
    }
}
