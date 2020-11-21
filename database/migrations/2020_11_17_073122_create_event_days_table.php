<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_event_days', function (Blueprint $table) {
            $table->bigIncrements('event_day_id')->comment('Primary Key');
            $table->foreignId('event_id')->comment('Foreign Key')->comment('Parent table => t_events');
            $table->unsignedTinyInteger('day')->nullable(false)->comment('0 = Sunday | 1 = Monday | 2 = Tuesday | 3 = Wednesday | 4 = Thursday | 5 = Friday | 6 = Saturday');
            $table->timestamps();
            $table->foreign('event_id')->references('event_id')->on('t_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_event_days');
    }
}
