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
        Schema::create('list_soals', function (Blueprint $table) {
            $table->id();
            $table->integer('guru_id');
            $table->string('token')->unique();
            $table->integer('waktu_menit');
            $table->string('mapel');
            $table->boolean('status'); // true = online , false = offline
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
        Schema::dropIfExists('list_soals');
    }
};
