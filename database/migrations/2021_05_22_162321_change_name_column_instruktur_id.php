<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameColumnInstrukturId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asisten', function (Blueprint $table) {
            $table->foreignId('jadwal_id')
                    ->constrained('jadwal')
                    ->onDelete('cascade');
            $table->dropForeign(['instruktur_id']);
            $table->dropColumn(['instruktur_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asisten', function (Blueprint $table) {
            //
        });
    }
}
