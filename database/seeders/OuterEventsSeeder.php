<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Http\Controllers\OuterEventsController;
use Illuminate\Database\Seeder;

class OuterEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 外部イベントを取り出す
        $controller = new OuterEventsController();
        $controller->fetchEvents();
    }
}
