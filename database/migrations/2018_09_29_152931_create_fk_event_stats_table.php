<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkEventStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_stats', function (Blueprint $table) {
            $table->integer('event_id')->unsigned()->after('id');
            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onUpdate('cascade');

            $table->integer('member_id')->unsigned()->after('event_id');
            $table->foreign('member_id')
                ->references('id')->on('members')
                ->onUpdate('cascade');    
            
            $table->integer('league_id')->unsigned()->after('solo_pts');
            $table->foreign('league_id')
                ->references('id')->on('leagues')
                ->onUpdate('cascade');    

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_stats', function (Blueprint $table) {
            $table->dropForeign('event_stats_event_id_foreign');
            $table->dropForeign('event_stats_member_id_foreign');
            $table->dropForeign('event_stats_league_id_foreign');
        });
    }
}
