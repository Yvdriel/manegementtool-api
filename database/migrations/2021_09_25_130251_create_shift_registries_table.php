<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_registries', function (Blueprint $table) {
            $table->id();
            $table->integer('shift_id');
            $table->integer('user_id');
            $table->time('time_start')->nullable();
            $table->time('time_end')->nullable();
            $table->boolean('approved')->default(false);
            $table->boolean('available')->nullable();
            $table->integer('approved_by')->nullable();
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
        Schema::dropIfExists('shift_registries');
    }
}
