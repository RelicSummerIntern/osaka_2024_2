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
        Schema::create('outer_events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //イベントタイトル
            $table->datetime("held_datetime"); //開催日時
            $table->string("URL"); //URL
            $table->timestamps(); // 登録した時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('outer_events');
    }
};
