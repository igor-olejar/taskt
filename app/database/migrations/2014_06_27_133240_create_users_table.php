<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
                    $table->engine = 'InnoDB';
                    $table->increments('id');
                    $table->timestamps();
                    $table->string('username', 100);
                    $table->string('password', 255);
                    $table->string('firstname', 100);
                    $table->string('lastname');
                    $table->string('email');
                    $table->unique('email');
                    $table->string('company')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
