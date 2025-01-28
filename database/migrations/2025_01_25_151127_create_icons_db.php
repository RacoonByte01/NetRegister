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
        Schema::create('icons_db', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('group');
			$table->string('display');
			$table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icons_db');
	}
	/**
-- INSERT INTO icons_db (name, group, display) VALUES ('', 'device', '');
INSERT INTO icons_db (name, `group`, display) VALUES ('Adapter', 'device', 'fas fa-microchip');
INSERT INTO icons_db (name, `group`, display) VALUES ('Desktop', 'device', 'fas fa-desktop');
INSERT INTO icons_db (name, `group`, display) VALUES ('eBook', 'device', 'fas fa-book');
INSERT INTO icons_db (name, `group`, display) VALUES ('Game Console', 'device', 'fas fa-puzzle-piece');
INSERT INTO icons_db (name, `group`, display) VALUES ('Gamepad', 'device', 'fas fa-gamepad');
INSERT INTO icons_db (name, `group`, display) VALUES ('Heardphones', 'device', 'fas fa-headphones');
INSERT INTO icons_db (name, `group`, display) VALUES ('Laptop', 'device', 'fas fa-laptop');
INSERT INTO icons_db (name, `group`, display) VALUES ('Movile', 'device', 'fas fa-mobile-alt');
INSERT INTO icons_db (name, `group`, display) VALUES ('Phone', 'device', 'fas fa-phone');
INSERT INTO icons_db (name, `group`, display) VALUES ('Raspberry', 'device', 'fab fa-raspberry-pi');
INSERT INTO icons_db (name, `group`, display) VALUES ('Repeater', 'device', 'fas fa-greater-than');
INSERT INTO icons_db (name, `group`, display) VALUES ('Router', 'device', 'fas fa-square');
INSERT INTO icons_db (name, `group`, display) VALUES ('Server', 'device', 'fas fa-server');
INSERT INTO icons_db (name, `group`, display) VALUES ('Tablet', 'device', 'fas fa-tablet-alt');
INSERT INTO icons_db (name, `group`, display) VALUES ('Smart TV', 'device', 'fas fa-tv');
INSERT INTO icons_db (name, `group`, display) VALUES ('Printer', 'device', 'fas fa-print');
INSERT INTO icons_db (name, `group`, display) VALUES ('Wifi', 'mac-type', 'fas fa-wifi');
INSERT INTO icons_db (name, `group`, display) VALUES ('Elthernet', 'mac-type', 'fas fa-ethernet');
INSERT INTO icons_db (name, `group`, display) VALUES ('Bluetooth', 'mac-type', 'fab fa-bluetooth');
	*/
};
