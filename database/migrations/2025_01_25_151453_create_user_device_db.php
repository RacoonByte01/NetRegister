<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_device_db', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_device')->unsigned();
            $table->primary(['id_user', 'id_device']);
            $table->foreign('id_user')->references('id')->on('users_db');
            $table->foreign('id_device')->references('id')->on('devices_db');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_device_db');
    }
};
