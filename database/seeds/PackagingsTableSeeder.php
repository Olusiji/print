<?php

use Illuminate\Database\Seeder;
use App\Packaging;

class PackagingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packaging1 = new Packaging();
        $packaging1->vendor_id = 3;
        $packaging1->type = "Dust cover";
        $packaging1->price = 1000;
        $packaging1->save();

        $packaging1 = new Packaging();
        $packaging1->vendor_id = 3;
        $packaging1->type = "Leather Dust cover";
        $packaging1->price = 3000;
        $packaging1->save();
    }
}
