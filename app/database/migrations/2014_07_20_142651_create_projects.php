<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjects extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table)
		{
			// Increments method will make a Primary, Auto-Incrementing field.
			// Most tables start off this way
			$table->increments('id');
			
			// This generates two columns: `created_at` and `updated_at` to
			// keep track of changes to a row
			$table->timestamps();
			
			// This creates a column where project name is stored
			$table->string('name');
			
			// This creates a column where project time is stored in seconds.
			// We use bitit as to allow for a user to track time into millions of years.
			$table->bigInteger('time_elapsed_total');
			
			// This creates a column where project time is stored in seconds.
			// We use bitit as to allow for a user to track time into millions of years.
			$table->bigInteger('time_elapsed_start');
			
			// This generates one column that stores a boolean to keep track of time elapsed
			// We do this to track time server side.
			$table->boolean('time_elapsed_track'); 
			
			// This maps the project to a user
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
		
		// drop the table
		Schema::drop('projects');
	
	}

}
