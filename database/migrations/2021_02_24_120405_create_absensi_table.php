<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')
                    ->constrained('jadwal')
                    ->onDelete('cascade');
            $table->foreignId('user_id')
                    ->constrained('users')
                    ->onDelete('cascade');
            $table->foreignId('bap_id')
                    ->constrained('bap')
                    ->onDelete('cascade');
            $table->enum('status', ['instruktur', 'asisten']);
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
        Schema::dropIfExists('absensi');
    }
}
