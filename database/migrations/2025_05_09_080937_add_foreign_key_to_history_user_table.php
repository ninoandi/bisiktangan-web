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
        Schema::table('history_user', function (Blueprint $table) {
        $table->foreign('id_user')
              ->references('id')->on('users')
              ->onDelete('cascade'); // bisa diubah ke set null, restrict, dll
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history_user', function (Blueprint $table) {
        $table->dropForeign(['id_user']);
    });
    }
};