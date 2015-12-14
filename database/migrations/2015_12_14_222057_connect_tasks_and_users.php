<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectTasksAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {

            # Add a new INT field called `user_id` that has to be unsigned (i.e. positive)
            $table->integer('user_id')->unsigned()->nullable();

            # This field `user_id` is a foreign key that connects to the `id` field in the `authors` table
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {

            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            $table->dropForeign('tasks_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
