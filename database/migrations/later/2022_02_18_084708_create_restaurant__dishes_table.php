<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant__dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('restaurant_name')->nullable();
            $table->text('details')->nullable();
            $table->string('calories')->nullable();
            $table->string('preparation_time')->nullable();
            $table->string('price')->nullable();
            $table->string('ingredients')->nullable();
            $table->string('has_offer')->nullable();
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
        Schema::dropIfExists('restaurant__dishes');
    }
}
