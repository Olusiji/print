<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id');
            $table->integer('product_id');
            $table->integer('cover_id');
            $table->integer('paper_price_id');
            $table->integer('no_of_sheets');
            $table->string('lamination');
            $table->double('cost',15,8);
            $table->integer('packaging_id');
            $table->integer('rating')->nullable();
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
        Schema::dropIfExists('job_items');
    }
}
