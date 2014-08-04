<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		 # Create the notes table
		Schema::create('notes', function($table) {			
			
			#AI, PK
			$table->increments('id');
		
			# created at, updated_columns
			$table->timestamps();
			
			# General actions data to create columns
			// Column to track detail, human readable message 
			$table->text('content');
			// Column to track the project title
			$table->string('project_title');
			// Column to track the note title
			$table->string('title');

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
		Schema::drop('notes');
	}

}
