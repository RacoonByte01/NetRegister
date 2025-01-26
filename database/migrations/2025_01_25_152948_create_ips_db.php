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
        Schema::create('ips_db', function (Blueprint $table) {
            $table->bigInteger('mac')->unsigned();
            $table->string('addres');
            $table->primary('mac');
            $table->foreign('mac')->references('id')->on('macs_db')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ips_db');
    }
};
