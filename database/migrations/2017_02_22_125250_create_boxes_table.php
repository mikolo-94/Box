<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boxes', function ($table) {
            $table->increments('id');
            $table->string('receiver', 30);
            $table->float('weight', 20, 2);
            $table->string('box_color', 30);
            $table->string('destination', 20);
            $table->float('shipping_cost', 20, 2);
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
        Schema::dropIfExists('boxes');
    }
}
