<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectOwnersAndTasks extends Migration
{
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {

            # Add a new INT field called `owner_id` that has to be unsigned (i.e. positive)
            $table->integer('owner_id')->unsigned()->nullable();

            # This field `owner_id` is a foreign key that connects to the `id` field in the `owners` table
            $table->foreign('owner_id')->references('id')->on('owners');

        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('tasks_owner_id_foreign');

            $table->dropColumn('owner_id');
        });
    }
}