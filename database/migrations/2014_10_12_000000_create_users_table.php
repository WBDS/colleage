<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');                           //Account id
            $table->string('name');                             //User's real name.
            $table->string('email')->unique();                  //Account email
            $table->string('password', 60);                     //Account password
            $table->string("username")->unique();               //Account username
            $table->boolean('confirmed')->default(0);           //Account validation
            $table->string('confirmation_code')->nullable();    //Account validation code
            $table->string('mobile_no', 20);                    //Mobile number of this user
            $table->string('pin_no');                           //Pin number of this user.
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
