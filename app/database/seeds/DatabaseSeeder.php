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

		$this->call('UserTableSeeder');
                $this->command->info('User table seeded');
                
                $this->call('ClientTableSeeder');
                $this->command->info('Client table seeded');
                
                $this->call('ProjectTableSeeder');
                $this->command->info('Project table seeded');
                
                $this->call('ProjectUserTableSeeder');
                $this->command->info('Project_user table seeded');
                
                $this->call('TaskTableSeeder');
                $this->command->info('Task table seeded');
                
                $this->call('CheckinTableSeeder');
                $this->command->info('Checkin table seeded');
	}

}
