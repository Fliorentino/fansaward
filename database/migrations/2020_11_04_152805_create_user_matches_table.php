<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('user_matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('point');
            $table->unsignedBigInteger('user_competition_id');
            $table->unsignedBigInteger('match_id');
            $table->foreign('user_competition_id')->references('id')->on('user_competitions')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('match_id')->references('id')->on('match')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('user_matches',function(Blueprint $table){
            $table->dropForeign('user_matches_user_competition_id_foreign');
            $table->dropForeign('user_matches_match_id_foreign');
        });
        Schema::dropIfExists('user_matches');
    }
}
