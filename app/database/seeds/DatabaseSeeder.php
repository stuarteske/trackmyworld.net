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
        $this->command->info('User table seeded!');

        $this->call('PlannerTableSeeder');
        $this->command->info('Planner table seeded!');

        $this->call('ProfileTableSeeder');
        $this->command->info('Profile table seeded!');

        $this->call('OrganisationTableSeeder');
        $this->command->info('Organisation table seeded!');

        $this->call('RoleTableSeeder');
        $this->command->info('Role table seeded!');

        $this->call('PermissionTableSeeder');
        $this->command->info('Permission table seeded!');

        $this->call('SubscriberTableSeeder');
        $this->command->info('Subscriber table seeded!');
    }

}
