<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('bars', function (Blueprint $table) {
			$table->increments('id');
			$table->string('type');
			$table->string('name')->unique();
			$table->string('address');
			$table->integer('phone');
			$table->string('website');
			$table->string('email');
			$table->boolean('owner');
			$table->integer('owner_id')->unsigned();
			$table->foreign('owner_id')->references('id')->on('users');
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
