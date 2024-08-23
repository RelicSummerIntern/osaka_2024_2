<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント詳細</title>
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* 横スクロールの防止 */
        }
        .event-container {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 20px;
            color: #333;
        }
        .event-item {
            margin-bottom: 20px;
            padding: 15px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .event-item h3 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #007bff;
        }
        .event-item p {
            margin: 5px 0;
        }
        .event-item .event-title {
            font-weight: bold;
        }
        .event-item .event-date {
            font-size: 18px;
            color: #888;
        }
        .event-item .event-location {
            font-size: 18px;
        }
        .event-item .event-comm {
            font-size: 18px;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 18px;
        }
        .navigation button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
        }
        .navigation button:hover {
            background-color: #0056b3;
        }
        .event-create {
            margin: 20px auto;
            padding: 15px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 90%;
            width: 400px;
            box-sizing: border-box; /* パディングとボーダーを含む */
        }
        .event-create h3 {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 15px;
            text-align: center;
        }
        .event-create label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .event-create input, .event-create textarea {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }
        .event-create textarea {
            resize: vertical;
            min-height: 80px;
        }
        .event-create button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
        }
        .event-create button:hover {
            background-color: #0056b3;
        }
        .date-display {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }
        .date-link {
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
            margin: 0 20px;
        }
        .date-link:hover {
            text-decoration: underline;
        }
        .date-display p {
            margin: 0;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="event-container">

        <!-- 日付の表示 -->
        <div class="date-display">
            @php
                $previousDate = $date->copy()->subDay()->format('Y-m-d');
                $nextDate = $date->copy()->addDay()->format('Y-m-d');
            @endphp
            <a href="{{ url('/events/' . $previousDate) }}" class="date-link">&lt;</a>
            <p>{{ $date->format('m/d') }}</p>
            <a href="{{ url('/events/' . $nextDate) }}" class="date-link">&gt;</a>
        </div>

        <!-- 所属コミュニティのイベント一覧 -->
        <h2>所属コミュニティのイベント</h2>
        @if (isset($comm_events) && !empty($comm_events))
            @foreach ($comm_events as $event)
                <div class="event-item">
                    <h3>{{ htmlspecialchars($event->title) }}</h3>
                    <p class="event-date">開始日時: {{ \Carbon\Carbon::parse($event->held_datetime)->format('m/d H:i') }}</p>
                    <p class="event-date">
                        終了日時: 
                        @if ($event->end_time)
                            {{ \Carbon\Carbon::parse($event->end_time)->format('m/d H:i') }}
                        @endif
                    </p>
                    <p class="event-location">場所: {{ htmlspecialchars($event->held_place) }}</p>
                    <p>{{ nl2br(htmlspecialchars($event->description)) }}</p>
                    <p class="event-comm">
                        <!-- コミュニティ名をリンクにする -->
                        <a href="{{ url('/community/' . $event->comms->id . '/enter') }}">
                            {{ htmlspecialchars($event->comms->name) }}
                        </a>
                    </p>
                </div>
            @endforeach
        @else
            <p>表示するイベントがありません。</p>
        @endif

        <!-- 外部イベント一覧 -->
        <h2>外部イベント</h2>
        @if (isset($outer_events) && !empty($outer_events))
            <ul>
                @foreach ($outer_events as $outer_event)
                    <li>
                        <h3>
                            <a href="{{ htmlspecialchars($outer_event->URL) }}" target="_blank">
                                {{ htmlspecialchars($outer_event->title) }}
                            </a>
                        </h3>
                        <p>{{ nl2br(htmlspecialchars($outer_event->description)) }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>外部イベントがありません。</p>
        @endif


        <div class="navigation">
            <button onclick="location.href='{{ url('/mypage') }}'">マイページ</button>
            <button onclick="location.href='{{ url('/events') }}'">イベント</button>
        </div>
    </div>
</body>
</html>
