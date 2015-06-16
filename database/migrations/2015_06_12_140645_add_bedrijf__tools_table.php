<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBedrijfToolsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bedrijf__tools', function($table)
		{
    		$table->foreign('id_bedrijf')->reference('id')->on('bedrijfs');
    		$table->foreign('id_tool')->reference('id')->on('tools');
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
