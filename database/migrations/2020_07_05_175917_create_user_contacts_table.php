<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserContactsTable extends Migration
{
    public function up()
    {
        Schema::create('user_contacts', static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()->onUpdate('cascade');

            $table->foreignId('contact_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()->onUpdate('cascade');

            $table->unique(['user_id', 'contact_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_contacts');
    }
}