<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
	    $user1->name = "James Bond";
	    $user1->email = "bonds@aroloya.com";
	    $user1->password = bcrypt('secretplace');
	    $user1->save();

	    $user2 = new User();
	    $user2->name = "Noah Bond";
	    $user2->email = "naoh@aroloya.com";
	    $user2->password = bcrypt('secretplace');
	    $user2->save();

	    $user3 = new User();
	    $user3->name = "David Jones";
	    $user3->email = "jones@aroloya.com";
	    $user3->password = bcrypt('secretplace');
	    $user3->save();

	    $user4 = new User();
	    $user4->name = "Joe Praise";
	    $user4->email = "praise@aroloya.com";
	    $user4->password = bcrypt('secretplace');
	    $user4->save();

	    $user5 = new User();
	    $user5->name = "Kenny Kore";
	    $user5->email = "kenny@aroloya.com";
	    $user5->password = bcrypt('secretplace');
	    $user5->save();

	    $user6 = new User();
	    $user6->name = "David Oyedepo";
	    $user6->email = "oyedepo@aroloya.com";
	    $user6->password = bcrypt('secretplace');
	    $user6->save();
    }
}
