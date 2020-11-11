<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('user_competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('point');
            $table->unsignedBigInteger('etape_id');
            $table->unsignedBigInteger('competition_id');
            $table->foreign('etape_id')->references('id')->on('etapes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('user_competition',function(Blueprint $table){
            $table->dropForeign('user_competition_etape_id_foreign');
            $table->dropForeign('user_competition_competition_id_foreign');
        });
        Schema::dropIfExists('user_competitions');
    }
}
