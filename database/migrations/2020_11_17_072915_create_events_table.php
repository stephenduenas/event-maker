<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_events', function (Blueprint $table) {
            $table->bigIncrements('event_id')->comment('Primary Key');
            $table->string('event_name')->nullable(false)->comment('Name of Event');
            $table->timestamp('start_date', 0)->nullable(false)->useCurrent()->comment('Event Start Date');
            $table->timestamp('end_date', 0)->nullable(false)->useCurrent()->comment('Event End Date');;
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
        Schema::dropIfExists('t_events');
    }
}
