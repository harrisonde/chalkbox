<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
	
		$this->call('ProjectTableSeeder');
	}

}

class ProjectTableSeeder extends Seeder {

	/**
	 * Run the database seeds adding default project data.
	 *
	 * @return string
	 */
	public function run()
    {	
    	# Instantiate the projet model	
    	$project = new Project();
        
        # Build seed data
        $project->name = 'Chalkbox Welcome';
        $project->time_elapsed_total = 00;
        $project->time_elapsed_start = 00;
        $project->time_elapsed_track = false;
        
        
        # Magic: Eloquent
        $project->save();
        
        # Return string to CLI
        $this->command->info('Project table seeded!');
        
    }

}
