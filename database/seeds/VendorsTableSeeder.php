<?php

use Illuminate\Database\Seeder;
use App\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendor1 = new Vendor();
	    $vendor1->name = "Bamijo Stella";
	    $vendor1->email = "bamijo@aroloya.com";
	    $vendor1->password = bcrypt('secretplace');
	    $vendor1->save();

	    $vendor2 = new Vendor();
	    $vendor2->name = "Drink water";
	    $vendor2->email = "water@aroloya.com";
	    $vendor2->password = bcrypt('secretplace');
	    $vendor2->save();

	    $vendor3 = new Vendor();
	    $vendor3->name = "Olusiji Obadofin";
	    $vendor3->email = "siji@aroloya.com";
	    $vendor3->password = bcrypt('secretplace');
	    $vendor3->save();

	    $vendor4 = new Vendor();
	    $vendor4->name = "Bench Mark";
	    $vendor4->email = "bench@aroloya.com";
	    $vendor4->password = bcrypt('secretplace');
	    $vendor4->save();

	    $vendor5 = new Vendor();
	    $vendor5->name = "Babalola";
	    $vendor5->email = "babalola@aroloya.com";
	    $vendor5->password = bcrypt('secretplace');
	    $vendor5->save();

	    $vendor6 = new Vendor();
	    $vendor6->name = "Dream weaver";
	    $vendor6->email = "dream@aroloya.com";
	    $vendor6->password = bcrypt('secretplace');
	    $vendor6->save();
    }
}
