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
            $table->foreign("user_id")->references("id")->on("users"); //コミュニティid
            $table->foreign("comm_id")->references("id")->on("comms"); //コミュニティid
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
