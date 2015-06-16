<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBedrijfToolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bedrijf__tools', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('bedrijf_id')->unsigned();
			$table->integer('tool_id')->unsigned();
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
		Schema::drop('bedrijf__tools');
	}

}
