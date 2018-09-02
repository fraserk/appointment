<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->unsigninterger();
            $table->json('opening_hours_mon');
            $table->json('opening_hours_tue');
            $table->json('opening_hours_wed');
            $table->json('opening_hours_thu');
            $table->json('opening_hours_fri');
            $table->json('opening_hours_sat');
            $table->json('opening_hours_sun');
            
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
        Schema::dropIfExists('schedules');
    }
}
