<?php

use Illuminate\Database\Seeder;
use App\PaperPrice;

class PaperPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paperprice1 = new PaperPrice();
        $paperprice1->vendor_id = 3;
        $paperprice1->product_id = 1;
        $paperprice1->paper_type_id = 1;
        $paperprice1->size_id = 2;
        $paperprice1->price = 100;
        $paperprice1->save();

        $paperprice2 = new PaperPrice();
        $paperprice2->vendor_id = 3;
        $paperprice2->product_id = 1;
        $paperprice2->paper_type_id = 1;
        $paperprice2->size_id = 2;
        $paperprice2->price = 120;
        $paperprice2->save();

        $paperprice3 = new PaperPrice();
        $paperprice3->vendor_id = 3;
        $paperprice3->product_id = 1;
        $paperprice3->paper_type_id = 1;
        $paperprice3->size_id = 5;
        $paperprice3->price = 130;
        $paperprice3->save();

        $paperprice4 = new PaperPrice();
        $paperprice4->vendor_id = 3;
        $paperprice4->product_id = 1;
        $paperprice4->paper_type_id = 1;
        $paperprice4->size_id = 4;
        $paperprice4->price = 140;
        $paperprice4->save();

        $paperprice5 = new PaperPrice();
        $paperprice5->vendor_id = 3;
        $paperprice5->product_id = 1;
        $paperprice5->paper_type_id = 1;
        $paperprice5->size_id = 5;
        $paperprice5->price = 150;
        $paperprice5->save();

        $paperprice6 = new PaperPrice();
        $paperprice6->vendor_id = 3;
        $paperprice6->product_id = 1;
        $paperprice6->paper_type_id = 1;
        $paperprice6->size_id = 4;
        $paperprice6->price = 160;
        $paperprice6->save();

        $paperprice7 = new PaperPrice();
        $paperprice7->vendor_id = 3;
        $paperprice7->product_id = 1;
        $paperprice7->paper_type_id = 1;
        $paperprice7->size_id = 5;
        $paperprice7->price = 170;
        $paperprice7->save();
    }
}
