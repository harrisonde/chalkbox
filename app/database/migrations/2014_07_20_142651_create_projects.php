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
			
			// This creates a column where the project description is stored
			$table->string('description');
			
			// This creates a table where the project status is stored
			$table->string('status');
			
			// This creates a table where the date is stored
			$table->date('date_start');
			
			// This creates a table where the date is stored
			$table->date('date_end');
			
			// This maps the project to a user
			$table->integer('user_id'); #foreign key
		
		
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
