<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();*/

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('cc')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('password');
            $table->bigInteger('phone');
            //$table->string('campus_id');
            //$table->unsignedBigInteger('rol_id')->index();
            $table->string('work_function');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
