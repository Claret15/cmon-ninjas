<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_stats', function (Blueprint $table) {
            $table->increments('id');
            // event_id         // generated from the fk_event_stats migration
            // member_id        // generated from the fk_event_stats migration
            $table->bigInteger('guild_pts')->unsigned();
            $table->bigInteger('solo_pts')->unsigned();
            // league_id        // generated from the fk_event_stats migration
            $table->integer('solo_rank')->unsigned();
            $table->integer('global_rank')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_stats');
    }
}
