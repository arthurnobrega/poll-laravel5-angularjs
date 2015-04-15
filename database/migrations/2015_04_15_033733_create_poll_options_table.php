<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollOptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poll_options', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('poll_id')->unsigned();
			$table->foreign('poll_id')->references('id')->on('polls');
			$table->string('text', 500);
			$table->integer('votes');
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
		Schema::drop('poll_options');
	}

}
