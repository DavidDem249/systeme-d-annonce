<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->unsignedBigInteger('auteur_id');
            $table->foreign('auteur_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('acheteur_id');
            $table->foreign('acheteur_id')->references('id')->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('ad_id');
            $table->foreign('ad_id')->references('id')->on('ads')
            ->onDelete('cascade');
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
        Schema::dropIfExists('messages');
    }
}
