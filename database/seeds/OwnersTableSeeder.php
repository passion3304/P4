<?php

use Illuminate\Database\Seeder;

class OwnersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('owners')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'first_name' => 'Brendan',
        'last_name' => 'Murphy',
        ]);

        DB::table('owners')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'first_name' => 'Jill',
        'last_name' => 'Harvard',
        ]);

        DB::table('owners')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'first_name' => 'Jamal',
        'last_name' => 'Harvard',
        ]);

    }
}