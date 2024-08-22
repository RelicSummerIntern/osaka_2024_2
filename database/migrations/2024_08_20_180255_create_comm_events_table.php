<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
// コミュニティイベント
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comm_events', function (Blueprint $table) {
            $table->id(); // イベントの主キー
            $table->string('title'); //イベントタイトル
            $table->unsignedBigInteger('comm_id'); // comm_idカラム（）
            // comm_idを連携
            $table->foreign('comm_id')->references('id')->on('comms')->onDelete('cascade');
            $table->datetime('held_datetime'); // 開始日時
            $table->dateTime('end_time')->nullable();//修了時間
            $table->string('held_place')->nullable();// 開催場所
            $table->timestamps(); // 登録した時間
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comm_events');
    }
};
