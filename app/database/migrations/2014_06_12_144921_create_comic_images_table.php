<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comic_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('comic_name', 255);
			$table->string('comic_image', 255);
			$table->integer('comic_page');
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
		Schema::drop('comic_images');
	}

}
