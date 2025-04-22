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
         Schema::create('video', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_video');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('video_url');
            $table->timestamp('created_at');
             $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};