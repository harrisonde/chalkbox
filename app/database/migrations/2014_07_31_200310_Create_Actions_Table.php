<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		# Create the timers table
		Schema::create('actions', function($table) {			
			
			#AI, PK
			$table->increments('id');
		
			# created at, updated_columns
			$table->timestamps();
			
			# General actions data to create columns
			// Column to track action type create, update, delete...
			$table->string('type');
			// Column to track detail, human readable message 
			$table->string('description');
			// Column to track what model called the action
			$table->string('model');

			#FK
			$table->integer('project_id');
			$table->integer('user_id');
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('actions');
	}

}
