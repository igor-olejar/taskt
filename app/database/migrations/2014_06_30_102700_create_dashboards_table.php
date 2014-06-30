<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dashboards', function(Blueprint $table)
		{
                        $table->engine = 'InnoDB';
			$table->increments('id');
			$table->timestamps();
                        $table->string('title');
                        $table->string('tasks');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dashboards');
	}

}
