<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('sender_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('target_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');

            $table->text('message');

            $table->boolean('read')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}