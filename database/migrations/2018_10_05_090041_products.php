<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_product');
            $table->string('slug');
            $table->integer('price');
            $table->string('img');
            $table->string('warranty');
            $table->string('accessories');
            $table->string('condition');
            $table->string('promotion');
            $table->tinyInteger('status');
            $table->text('description');
            $table->tinyInteger('featured');
            $table->string('screen');
            $table->string('operating');
            $table->string('camera_after');
            $table->string('camera_before');
            $table->string('cpu');
            $table->string('ram');
            $table->string('memory');
            $table->string('memory_stick');
            $table->string('sim');
            $table->string('battery_capacity');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
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
            'category_id',
        ]);
        Schema::dropIfExists('products');
    }
}
