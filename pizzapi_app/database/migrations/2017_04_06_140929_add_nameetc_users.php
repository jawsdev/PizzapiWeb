<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameetcUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('address');
            $table->dropColumn('phone_number');
        });
    }
}
