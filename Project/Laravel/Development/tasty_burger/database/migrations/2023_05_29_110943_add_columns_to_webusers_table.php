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
        Schema::table('webusers', function (Blueprint $table) {
            $table->string('gender')->nullable()->after('password');
            $table->string('language')->nullable()->after('gender');
            $table->string('country_id')->nullable()->after('language');
            $table->string('file')->nullable()->after('gender');
            $table->enum('status', ['Block', 'Unblock'])->default('Unblock')->after('file');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('contries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webusers', function (Blueprint $table) {
            //
        });
    }
};
