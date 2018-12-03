<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Informations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('phone');
            $table->string('point');
            $table->string('name');
            $table->integer('loyal_id')->unsigned();
            $table->foreign('loyal_id')
                ->references('id')
                ->on('loyal_customers')
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
            'loyal_id',
        ]);
        Schema::dropIfExists('informations');
    }
}
