<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(OwnersTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(TasksTableSeeder::class);

        Model::reguard();
    }
}
