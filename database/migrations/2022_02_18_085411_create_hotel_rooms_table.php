<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('capacity')->nullable();
            $table->foreignIdFor(Hotel::class)->constrained()->onDelete('cascade');
            $table->text('details')->nullable();
            $table->integer('price_per_night')->nullable();
            $table->integer('has_offer')->nullable();
            $table->unsignedInteger('available_rooms')->default(1);
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
        Schema::dropIfExists('hotel__rooms');
    }
}
