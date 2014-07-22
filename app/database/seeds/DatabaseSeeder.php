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
		$this->call('UsersTableSeeder');
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
		$user = User::create(array('username' => 'admin', 'password' => Hash::make('P@ssword'), 'email' => 'harrison.destefano@gmail.com', 'is_admin' => true));
		
		# Return string to CLI
		$this->command->info('User table seeded with user: '.$user['username']);
		
		# get the users id, we need it to seed the database.
		$user = User::firstOrCreate(array('username' => $user['username']));
		
		# Seed the database with a default project for this user
		$this->ProjectTableSeed($user);
		
		# Standard User
		$user = User::create(array('username' => 'Harrison', 'password' => Hash::make('P@ssword'), 'email' => 'harrison.destefano@gmail.com', 'is_admin' => false));
		
		# Return string to CLI
		$this->command->info('User table seeded with user: '.$user['username']);
		
		# get the users id, we need it to seed the database.
		$user = User::firstOrCreate(array('username' => $user['username']));
		
		# Seed the database with a default project for this user
		$this->ProjectTableSeed($user);
		
    }
    
    /**
	 * Run the database seeds adding project for a default user.
	 *
	 * @return string
	 */
    public function ProjectTableSeed($user)
    {

    	# Instantiate the projet model	
    	$project = new Project();
        
        # Build seed data
        $project->name = 'Chalkbox Welcome';
        $project->time_elapsed_total = 00;
        $project->time_elapsed_start = 00;
        $project->time_elapsed_track = false;
        $project->user_id = $user['id'];
        
        # Magic: Eloquent
        $project->save();
        
         # Return string to CLI
        $this->command->info('Project table seeded for '.$user['username'].' with Chalkbox Welcome.');

    }
}
