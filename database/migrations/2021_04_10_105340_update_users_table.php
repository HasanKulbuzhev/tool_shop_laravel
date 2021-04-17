<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table){
            $table->string('last_name')->default(null);
            $table->tinyInteger('phone')->nullable();
            $table->tinyInteger('is_subscribed')->nullable();
            $table->tinyInteger('is_admin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('last_name');
            $table->dropColumn('phone');
        });
    }
}
