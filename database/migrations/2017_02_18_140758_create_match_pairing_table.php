<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchPairingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_pairing', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('pairing_id');
            $table->integer('points');
            $table->integer('emailed');
            $table->integer('available`');
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
        Schema::dropIfExists('match_pairing');
    }
}
