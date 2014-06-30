<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
                        $table->engine = 'InnoDB';
			$table->increments('id');
			$table->timestamps();
                        $table->string('name');
                        $table->text('description')->nullable();
                        $table->integer('client')->unsigned();
                        $table->dateTime('start_date')->nullable();
                        $table->dateTime('end_date')->nullable();
                        $table->integer('rate')->nullable();
                        $table->string('roundup', 15)->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('projects');
	}

}
