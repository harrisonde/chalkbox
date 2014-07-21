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
		$this->call('UsersTableSeeder');
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

class UsersTableSeeder extends Seeder{
	/**
	 * Run the database seeds adding default user data.
	 *
	 * @return string
	 */
	public function run()
    {
		# Admin User
		User::create(array('username' => 'admin', 'password' => Hash::make('P@ssword'), 'email' => 'harrison.destefano@gmail.com', 'is_admin' => true));
		
		# Standard User
		User::create(array('username' => 'Harrison', 'password' => Hash::make('P@ssword'), 'email' => 'harrison.destefano@gmail.com', 'is_admin' => false));
		# Return string to CLI
		$this->command->info('User table seeded with admin/P@ssword and harrison/P@ssword');
    }
}
