<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BillDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->integer('product_id')->unsigned();
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')
                ->references('id')
                ->on('bills')
                ->onDelete('cascade');
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
        Schema::dropForeign([
            'bill_id',
        ]);
        Schema::dropIfExists('bill_detail');
    }
}
