<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite__lists', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_dish_id')->nullable(); //$table->foreignIdFor(Restaurant_Dish::class);
            $table->integer('user_id')->nullable();  // $table->foreignIdFor(User::class);
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
        Schema::dropIfExists('favourite__lists');
    }
}
