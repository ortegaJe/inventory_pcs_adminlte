<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });

        Schema::create('rams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('size');
            $table->string('standart'); //ddr2 ddr3 etc
            $table->string('type');
            $table->string('mhz');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });

        Schema::create('hdds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('size');
            $table->string('type');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });

        Schema::create('campus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //$table->unsignedBigInteger('user_id')->unique();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('cc')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('password');
            $table->bigInteger('phone');
            $table->unsignedBigInteger('campus_id')->index();
            $table->unsignedBigInteger('rol_id')->index();
            $table->string('work_function');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('campus_id')
                ->references('id')
                ->on('campus')
                ->onDelete('cascade');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();

            $table->foreign('rol_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->index('user_id', 'role_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            //$table->unsignedBigInteger('tec_id')->index();
            $table->string('serial', 56);
            $table->smallInteger('lote')->nullable();
            $table->unsignedBigInteger('type_id')->index();
            $table->string('manufacturer', 25);
            $table->string('model', 56);
            $table->unsignedBigInteger('ram_slot_00_id')->index();
            $table->unsignedBigInteger('ram_slot_01_id')->index();
            $table->unsignedBigInteger('hard_drive_id')->index;
            $table->string('cpu');
            $table->ipAddress('ip_range', 15);
            $table->macAddress('mac_address');
            $table->string('anydesk')->nullable();
            $table->string('os')->nullable();
            $table->unsignedBigInteger('created_by')->index();
            $table->unsignedBigInteger('rol_id')->index();
            $table->unsignedBigInteger('campus_id')->index();
            $table->String('location');
            $table->string('image')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';

            $table->foreign('rol_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');

            $table->foreign('ram_slot_00_id')
                ->references('id')
                ->on('rams')
                ->onDelete('cascade');

            $table->foreign('ram_slot_01_id')
                ->references('id')
                ->on('rams')
                ->onDelete('cascade');

            $table->foreign('hard_drive_id')
                ->references('id')
                ->on('hdds')
                ->onDelete('cascade');

            $table->foreign('campus_id')
                ->references('id')
                ->on('campus')
                ->onDelete('cascade');
        });

        Schema::create('machine_registration', function (Blueprint $table) {
            $table->primary('user_id', 'machine_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('machine_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('machine_id')
                ->references('id')
                ->on('machines')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machines');
        Schema::dropIfExists('machine_registration');
        Schema::dropIfExists('types');
        Schema::dropIfExists('rams');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('campus');
        Schema::dropIfExists('users');
    }
}
