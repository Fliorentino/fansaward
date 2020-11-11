<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        
        Schema::create('disks', function (Blueprint $table) {
        Schema::disableForeignKeyConstraints();
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('morceau');
            $table->date('date_sortie');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::table('disks',function(Blueprint $table){
            $table->dropForeign('disks_user_id_foreign');
        });
        Schema::dropIfExists('disks');
    }
}
