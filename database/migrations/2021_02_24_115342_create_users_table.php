<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('npm', 8);
            $table->string('nama', 30);
            $table->foreignId('kelas_id')
                    ->constrained('kelas')
                    ->onDelete('cascade');
            $table->string('email', 30)->unique();
            $table->string('no_telp', 13)->unique();
            $table->string('kata_sandi', 30);
            $table->enum('roles', ['asisten', 'staf']);
            $table->enum('active', ['y', 'n']);
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
        Schema::dropIfExists('users');
    }
}
