<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('job_name');
            $table->integer('user_id');
            $table->integer('vendor_id');
            $table->double('cost',15,8);
            $table->string('delivery_address');
            $table->string('city');
            $table->string('state');
            $table->string('phone_number');
            $table->enum('customer_payment_status', ['unpaid', 'paid']);
            $table->float('shipping_cost', 8, 2);
            $table->enum('order_status', ['sent to printer' ,'recieved by printer', 'picked up for delivery', 'delivered']);
            $table->enum('vendor_payment_status', ['unpaid', 'requested payment', 'paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
