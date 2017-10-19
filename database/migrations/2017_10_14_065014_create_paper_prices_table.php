<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vendor_id');
            $table->integer('product_id')->nullable();
            $table->integer('paper_type_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->float('price', 8, 2)->nullable();
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
        Schema::dropIfExists('paper_prices');
    }
}
