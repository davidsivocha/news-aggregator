<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feeds', function(Blueprint $table)
		{
			$table->increments('id');
            $table->enum('active', array('0', '1'));
            $table->string('title', 100)->default('');
            $table->enum('category', array('News', 'Esports', 'Technology'));
            $table->string('feed', 1000)->default('');
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
		Schema::drop('feeds')
	}

}
