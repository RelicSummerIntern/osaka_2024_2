<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
/**
 * コミュニティとユーザを結び付ける中間テーブル
 */
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comms2_users', function (Blueprint $table) {
            $table->id();
            // comm_id
            $table->unsignedBigInteger('comm_id'); 
            $table->foreign('comm_id')->references('id')->on('comms')->onDelete('cascade'); // comm_idを連携（元が削除されたとき、こちらも物理削除される）
            // user_id
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // user_idを連携
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comms2_users-tables');
    }
};
