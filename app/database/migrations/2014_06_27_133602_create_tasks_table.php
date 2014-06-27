<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
                        $table->engine = 'InnoDB';
			$table->increments('id');
			$table->timestamps();
                        $table->string('description');
                        $table->integer('user_id')->unsigned();
                        $table->integer('project_id')->unsigned();
                        $table->dateTime('start_date')->nullable();
                        $table->dateTime('end_date')->nullable();
                        $table->string('status', 20)->default('todo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
