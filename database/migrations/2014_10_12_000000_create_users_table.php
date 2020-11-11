<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('pseudo');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('tel');
            $table->string('adresse');
            $table->date('date_naissance');
            $table->string('avatar');
            $table->unsignedBigInteger('user_competition_id');
            $table->foreign('user_competition_id')->references('id')->on('user_competition')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            //$table->timestamp('email_verified_at')->nullable();
            //$table->rememberToken();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropForeign('users_user_competition_id_foreign');
            
        });
        Schema::dropIfExists('users');
    }

    public function user_competitions(){
        return $this->hasMany(User_competition::class);
    }
}