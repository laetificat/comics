<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('comics_name', 255);
			$table->string('comics_author', 255);
			$table->string('comics_cover', 255);
			$table->boolean('comics_featured')->default(0);
			$table->integer('comics_pages')->default(0);
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
		Schema::drop('comics');
	}

}
