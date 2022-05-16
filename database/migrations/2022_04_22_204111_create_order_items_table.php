<?php

use App\Models\Hotel;
use App\Models\Hotel_Room;
use App\Models\HotelOrder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //OrderItem model
        Schema::table('OrderItems', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->constrained()->onDelete('cascade');
            $table->integer('room_id')->constrained()->onDelete('cascade');
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->integer('rooms_count')->default(1);
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
        Schema::table('OrderItems', function (Blueprint $table) {
            //
        });
    }
}
