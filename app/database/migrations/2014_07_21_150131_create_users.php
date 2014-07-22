<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the users table and columns
		Schema::create('users', function($table){
			
			# build columns
			$table->increments('id');
			$table->string('username');
			$table->string('password');
			$table->string('email');
			$table->boolean('is_admin');
			$table->timestamps();
			$table->rememberToken();
				
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// undo the up method
		Schema::drop('users');
	}

}
