<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
/**
 * コミュニティ内のチャットを保存するDB
 */
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comm_chats', function (Blueprint $table) {
            $table->id();

            // comm_id
            $table->unsignedBigInteger('comm_id'); 
            $table->foreign('comm_id')->references('id')->on('comms')->onDelete('cascade'); // comm_idを連携
            // user_id
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // user_idを連携

            $table->string("text"); //本文

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comm_chats');
    }
};
