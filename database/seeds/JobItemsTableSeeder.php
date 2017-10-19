<?php

use Illuminate\Database\Seeder;
use App\JobItem;

class JobItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job_item1 = new JobItem();
        $job_item1->job_id = 1;
        $job_item1->product_id = 2;
        $job_item1->cover_id = 1;
        $job_item1->paper_price_id = 3;
        $job_item1->no_of_sheets = 30;
        $job_item1->lamination = "glossy";
        $job_item1->cost = 14000;
        $job_item1->packaging_id = 1;
        $job_item1->save();

        $job_item2 = new JobItem();
        $job_item2->job_id = 1;
        $job_item2->product_id = 1;
        $job_item2->cover_id = 1;
        $job_item2->paper_price_id = 3;
        $job_item2->no_of_sheets = 1;
        $job_item2->lamination = "glossy";
        $job_item2->cost = 6000;
        $job_item2->packaging_id = 2;
        $job_item2->save();

        $job_item3 = new JobItem();
        $job_item3->job_id = 2;
        $job_item3->product_id = 1;
        $job_item3->cover_id = 1;
        $job_item3->paper_price_id = 3;
        $job_item3->no_of_sheets = 40;
        $job_item3->lamination = "glossy";
        $job_item3->cost = 16000;
        $job_item3->packaging_id = 2;
        $job_item3->save();

        $job_item4 = new JobItem();
        $job_item4->job_id = 6;
        $job_item4->product_id = 2;
        $job_item4->cover_id = 2;
        $job_item4->paper_price_id = 3;
        $job_item4->no_of_sheets = 30;
        $job_item4->lamination = "matte";
        $job_item4->cost = 14000;
        $job_item4->packaging_id = 1;
        $job_item4->save();

        $job_item5 = new JobItem();
        $job_item5->job_id = 6;
        $job_item5->product_id = 2;
        $job_item5->cover_id = 1;
        $job_item5->paper_price_id = 3;
        $job_item5->no_of_sheets = 15;
        $job_item5->lamination = "matte";
        $job_item5->cost = 30000;
        $job_item5->packaging_id = 1;
        $job_item5->save();

        $job_item6 = new JobItem();
        $job_item6->job_id = 5;
        $job_item6->product_id = 2;
        $job_item6->cover_id = 1;
        $job_item6->paper_price_id = 3;
        $job_item6->no_of_sheets = 1;
        $job_item6->lamination = "glossy";
        $job_item6->cost = 15000;
        $job_item6->packaging_id = 2;
        $job_item6->save();

        $job_item7 = new JobItem();
        $job_item7->job_id = 5;
        $job_item7->product_id = 1;
        $job_item7->cover_id = 1;
        $job_item7->paper_price_id = 3;
        $job_item7->no_of_sheets = 20;
        $job_item7->lamination = "glossy";
        $job_item7->cost = 25000;
        $job_item7->packaging_id = 2;
        $job_item7->save();
    }
}
