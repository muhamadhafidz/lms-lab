<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnJadwalIdTableInstruktur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instruktur', function (Blueprint $table) {
            $table->foreignId('jadwal_id')
                    ->constrained('jadwal')
                    ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instruktur', function (Blueprint $table) {
            $table->dropColumn(['jadwal_id']);
            
        });
    }
}
