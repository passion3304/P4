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
        $owner_id = \App\Owner::where('last_name','=','Murphy')->pluck('id');
        DB::table('tasks')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	       	'owner_id' => $owner_id,
	        'title' => 'Mow the lawn',
	        'user_id'=>1,
	        'detail' => 'Cut the grass in the front and side yard. Weedwack the walkway.',
	        'status' => 'Not started',
	    ]);
	    $owner_id = \App\Owner::where('last_name','=','Harvard')->pluck('id');
	    DB::table('tasks')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'owner_id' => $owner_id,
	        'title' => 'Paint shed',
	        'user_id'=>1,
	        'detail' => 'Paint the shed in the backyard',
	        'status' => 'Completed',
	    ]);
	    $owner_id = \App\Owner::where('last_name','=','Harvard')->pluck('id');
	    DB::table('tasks')->insert([
	        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
	        'owner_id' => $owner_id,
	        'user_id'=>1,
	        'title' => 'Complete final project',
	        'detail' => 'Complete P4 for Dynamic Web Applications.',
	        'status' => 'In progress',
	    ]);
    }
}
