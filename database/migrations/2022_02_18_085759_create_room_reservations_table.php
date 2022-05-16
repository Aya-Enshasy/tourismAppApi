<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Hotel_Room::class)->constrained('hotel_rooms')->nullOnDelete(); // ->restrictOnDelete();;
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->integer('nights')->nullable();
            $table->integer('rooms_count')->default(1);
            $table->integer('total_price')->nullable(); // isn't float
            $table->foreignIdFor(User::class)->constrained('users')->cascadeOnDelete();
            $table->timestamps(); // date of reservation


//            nullOnDelete()
            $table->unique(['hotel_room_id','user_id'])->nullable();
            $table->enum('status',['reserving','reserved','cancelled']);
            $table->enum('payment',['pending','paid','failed']);
            $table->string('has_offer')->nullable();
            $table->string('room_name')->nullable();
            $table->integer('room_count')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room__reservations');
    }
}
