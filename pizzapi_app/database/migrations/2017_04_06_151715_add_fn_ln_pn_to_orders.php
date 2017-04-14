<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFnLnPnToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function($table) {
            $table->string('first_name');
            $table->string('last_name');
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
        Schema::table('orders', function($table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone_number');
        });
    }
}
