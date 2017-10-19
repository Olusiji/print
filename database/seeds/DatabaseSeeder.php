<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles come before user seeder here
		// $this->call(RoleTableSeeder::class); 

		// User seeder will use the Roles created above       
        $this->call(UsersTableSeeder::class);
        // Products seeder
        $this->call(ProductsTableSeeder::class);
        // Covers seeder
        $this->call(CoversTableSeeder::class);
        // Packaging seeder 
        $this->call(PackagingsTableSeeder::class);
        // Accounts seeder 
        $this->call(AccountsTableSeeder::class);
        // Vendors seeder
        $this->call(VendorsTableSeeder::class);
        // Sizes seeder
        $this->call(SizesTableSeeder::class);
        // Papers types seeder
        $this->call(PaperTypesTableSeeder::class);
        // Papers seeder
        $this->call(PaperPricesTableSeeder::class);
        // Jobs seeder 
        $this->call(JobsTableSeeder::class);
        // Job item seeder 
        $this->call(JobItemsTableSeeder::class);
    }
}
