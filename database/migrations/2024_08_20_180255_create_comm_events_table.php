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
            $table->id();
            $table->foreign("comm_id")->references("id")->on("comms"); //コミュニティid
            $table->datetime("held_datetime"); //開催日時
            $table->string("held_place"); //開催場所
            $table->timestamp(); //登録した時間
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
