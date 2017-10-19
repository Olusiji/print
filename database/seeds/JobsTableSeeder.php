<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job1 = new Job();
	    $job1->job_name = "James Bond";
	    $job1->user_id = 1;
	    $job1->vendor_id = 4;
	    $job1->cost = 20000;
	    $job1->delivery_address = "5 Allen avenue, Ikeja";
	    $job1->city = "Ikeja";
	    $job1->state = "Lagos";
	    $job1->phone_number = "08037994384";
	    $job1->shipping_cost = 1000;
	    $job1->save();

	    $job2 = new Job();
	    $job2->job_name = "Finished Dream";
	    $job2->user_id = 1;
	    $job2->vendor_id = 4;
	    $job2->cost = 30000;
	    $job2->delivery_address = "5 Allen avenue, Ikeja";
	    $job2->city = "Ikeja";
	    $job2->state = "Lagos";
	    $job2->phone_number = "08037994384";
	    $job2->shipping_cost = 1000;
	    $job2->save();

	    $job3 = new Job();
	    $job3->job_name = "Gentle Fists";
	    $job3->user_id = 3;
	    $job3->vendor_id = 5;
	    $job3->cost = 45000;
	    $job3->delivery_address = "5 Allen avenue, Ikeja";
	    $job3->city = "Ikeja";
	    $job3->state = "Lagos";
	    $job3->phone_number = "08037994384";
	    $job3->shipping_cost = 1500;
	    $job3->save();

	    $job4 = new Job();
	    $job4->job_name = "Broken Promises";
	    $job4->user_id = 2;
	    $job4->vendor_id = 5;
	    $job4->cost = 25000;
	    $job4->delivery_address = "5 Allen avenue, Ikeja";
	    $job4->city = "Ikeja";
	    $job4->state = "Lagos";
	    $job4->phone_number = "08037994384";
	    $job4->shipping_cost = 1200;
	    $job4->save();

	    $job5 = new Job();
	    $job5->job_name = "The Myth";
	    $job5->user_id = 2;
	    $job5->vendor_id = 3;
	    $job5->cost = 44000;
	    $job5->delivery_address = "5 Allen avenue, Ikeja";
	    $job5->city = "Ikeja";
	    $job5->state = "Lagos";
	    $job5->phone_number = "08037994384";
	    $job5->shipping_cost = 1000;
	    $job5->save();

	    $job6 = new Job();
	    $job6->job_name = "Earth Waves";
	    $job6->user_id = 3;
	    $job6->vendor_id = 3;
	    $job6->cost = 34000;
	    $job6->delivery_address = "5 Allen avenue, Ikeja";
	    $job6->city = "Ikeja";
	    $job6->state = "Lagos";
	    $job6->phone_number = "08037994384";
	    $job6->shipping_cost = 2500;
	    $job6->save();
    }
}
