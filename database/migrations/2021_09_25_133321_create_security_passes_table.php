<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateSecurityPassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_passes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('expiry_date');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE security_passes ADD security_pass MEDIUMBLOB");
        DB::statement("ALTER TABLE security_passes ADD id_card MEDIUMBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_passes');
    }
}
