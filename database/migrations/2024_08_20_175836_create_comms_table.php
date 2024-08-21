<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
/**
 * コミュニティとその名前を保存するDB
 */
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comms', function (Blueprint $table) {
            $table->id();
            $table->string("name"); //コミュニティ名
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comms');
    }
};
