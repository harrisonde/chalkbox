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
        // set project name
        $project->name = 'Chalkbox Welcome';
        
        // set project description
        $project->description = 'Get to know Chalkbox.';
        
        // set project status
        $project->status = 'Open';
        // set project start date
        $project->date_start = '1982-03-16';
        
         // set project end date
        $project->date_end = '0-0-0';
        
        // Get use id to link this project
        $project->user_id = $user['id'];
        
        # Magic: Eloquent
        $project->save();
        
        #create action
        $action = new Action();
        
        # set actions details
        $action->type = 'created';
        $action->description = 'Created new project, Chalkbox Welcome.';
        $action->model = "project";
        $action->project_id = $project['id'];
        $action->user_id = $user['id'];
   
		
		# Magic: Eloquent
		$action->save();
        
        
        
        $timer = new Timer();
        
        # no, tracking time is not started
        $timer->track = false;
        
        # time is kept in seconds
        $timer->time_elapsed_total = 00;
       
        $timer->time_elapsed_start = 00;
       
        $timer->time_elapsed_end = 00;
        
        #keep track of the project pk as fk
        $timer->project_id = $project['id'];
        
         # Magic: Eloquent
        $timer->save();
        
         # Return string to CLI
        $this->command->info('Project table seeded for '.$user['username'].' with Chalkbox Welcome.');

    }
}
