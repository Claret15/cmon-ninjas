<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFkMemberLeague extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {

        // THIS CAN BE DELETED - MOVE TO A FOLDER FOR NOW
        // I WILL NOT INCLUDED LEAGUE IN THE PLAYERS TABLE

            // DECIDING IF THIS SHOULD BE INCLUDED IN PLAYERS TABLE

            // $table->integer('league_id')->unsigned()->after('guild_id');

            // $table->foreign('league_id')
            //     ->references('id')->on('leagues')
            //     ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('members', function (Blueprint $table) {
        //     $table->dropForeign('members_league_id_foreign');
        // });
    }
}
