<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('tasks')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	       	'owner' => 'Jill',
	        'title' => 'Mow the lawn',
	        'detail' => 'Cut the grass in the front and side yard. Weedwack the walkway.',
	        'status' => 'Not started',
	    ]);

	    DB::table('tasks')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'owner' => 'Jamal',
	        'title' => 'Paint shed',
	        'detail' => 'Paint the shed in the backyard',
	        'status' => 'Completed',
	    ]);

	    DB::table('tasks')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'owner' => 'Brendan Murphy',
	        'title' => 'Complete final project',
	        'detail' => 'Complete P4 for Dynamic Web Applications.',
	        'status' => 'In progress',
	    ]);
    }
}
