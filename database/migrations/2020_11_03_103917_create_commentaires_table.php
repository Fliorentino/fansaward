<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commentaires', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message');
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('publication_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('publication_id')->references('id')->on('publication')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::table('commentaires',function(Blueprint $table){
            $table->dropForeign('commentaires_user_id_foreign');
            $table->dropForeign('commentaires_publication_id_foreign');
        });
        Schema::dropIfExists('commentaires');
    }
}
