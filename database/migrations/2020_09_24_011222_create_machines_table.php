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

        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->string('serial',56);
            $table->smallInteger('lote')->nullable();
            $table->unsignedBigInteger('type_id')->index();
            $table->string('manufacturer',25);
            $table->string('model',56);
            $table->string('ram_slot_00',20);
            $table->string('ram_slot_01',20);
            $table->string('hard_drive',20);
            $table->string('cpu');
            $table->string('ip_range',15);
            $table->macAddress('mac_address');
            $table->string('anydesk')->nullable();
            //$table->unsignedBigInteger('campus_id')->index();
            $table->String('location');
            $table->string('image')->nullable();
            $table->string('comment')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';

            $table->foreign('type_id')
            ->references('id')
            ->on('types')
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
        Schema::dropIfExists('roles');
    }
}
