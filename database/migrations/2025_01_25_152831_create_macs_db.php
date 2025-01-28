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
        Schema::create('macs_db', function (Blueprint $table) {
            $table->id();
            $table->string('addres');
            $table->bigInteger('device')->unsigned();
            $table->bigInteger('icon')->unsigned()->nullable();
            $table->foreign('device')->references('id')->on('devices_db')->onDelete('cascade');
			$table->foreign('icon')->references('id')->on('icons_db');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macs_db');
    }
};
