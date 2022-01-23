<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("country");
            $table->string("street_address");
            $table->string("second_street_address")->nullable();
            $table->string("city");
            $table->string("zip");
            $table->string("email");
            $table->string("phone");
            $table->string("notes")->nullable();
            $table->foreignId("order_id")->constrained("orders")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('billings');
    }
}
