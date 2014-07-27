<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		# Create the timers table
		Schema::create('timers', function($table) {			
			
			#AI, PK
			$table->increments('id');
		
			# created at, updated_columns
			$table->timestamps();
			
			# General timers data to create columns
			// This generates one column that stores a boolean to keep track of time elapsed
			// We do this to track time server side.
			$table->boolean('track');
			// This creates a column where project time is stored in seconds.
			// We use bitit as to allow for a user to track time into millions of years.
			$table->bigInteger('time_elapsed_total');
			
			// This creates a column where project time is stored in seconds.
			$table->bigInteger('time_elapsed_start');
			
			// This creates a column where project time is stored in seconds.
			$table->bigInteger('time_elapsed_end');
        

			#FK
			$table->integer('project_id');
			
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('timers');
	}

}
