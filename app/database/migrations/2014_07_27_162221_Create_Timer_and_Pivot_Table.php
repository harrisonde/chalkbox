<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimerAndPivotTable extends Migration {

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
			$table->boolean('track');
			$table->bigInteger('time');
			
		});
		
		# Create the project_timer pivot table
		Schema::create('project_timer', function($table) {	
			
			# AI, PK
			# none needed
			
			# General data needed for project_timer table
			$table->integer('project_id')->unsigned();
			$table->integer('timer_id')->unsigned();
			
			# Define foreign keys
			$table->foreign('project_id')->references('id')->on('projects');
			$table->foreign('timer_id')->references('id')->on('timers');
			
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
		Schema::drop('project_timer');
	}

}
