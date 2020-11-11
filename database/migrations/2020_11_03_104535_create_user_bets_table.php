<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('user_bets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('point');
            $table->unsignedBigInteger('user_competition_id');
            $table->foreign('user_competition_id')->references('id')->on('user_copetitions')->onDelete('restrict')->onUpdate('restrict');
            
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
       Schema::table('user_bets',function(Blueprint $table){
            $table->dropForeign('user_bets_user_competition_id_foreign');
        });
        Schema::dropIfExists('user_bets');
    }
}
