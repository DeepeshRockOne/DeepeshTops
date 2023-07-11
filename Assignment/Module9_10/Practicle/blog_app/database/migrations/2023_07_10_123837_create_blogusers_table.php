<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogusers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('password');
            $table->string('gender', 50);
            $table->string('language', 50);
            $table->string('image')->nullable();
            $table->longText('address');
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
        Schema::dropIfExists('blogusers');
    }
};
