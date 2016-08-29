<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('events', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('bar_id')->unsigned();
			$table->foreign('bar_id')->references('id')->on('bars');
			$table->string('title');
			$table->string('date');
			$table->string('content');
			$table->string('event_pic');
			$table->integer('created_by');
			$table->integer('created_by')->references('id')->on('users');
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
        //
    }
}
