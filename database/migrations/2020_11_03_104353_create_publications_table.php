<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('publications', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('contenu');
            $table->bigInteger('favori');
            $table->bigInteger('defavori');
            $table->unsignedBigInteger('user_id');
            $table->date('date_publication');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::disableForeignKeyConstraints();
        Schema::table('publications',function(Blueprint $table){
            $table->dropForeign('publications_user_id_foreign');
        });
        Schema::dropIfExists('publications');
    }
}
