<?php

use Illuminate\Database\Seeder;
use App\PaperType;

class PaperTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paper_type1 = new PaperType();
        $paper_type1->name = 'semi-gloss';
        $paper_type1->save();

        $paper_type2 = new PaperType();
        $paper_type2->name = 'linen';
        $paper_type2->save();

        $paper_type3 = new PaperType();
        $paper_type3->name = 'matte';
        $paper_type3->save();

        $paper_type4 = new PaperType();
        $paper_type4->name = 'pearl';
        $paper_type4->save();

    }
}
