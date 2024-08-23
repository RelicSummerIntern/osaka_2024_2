<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>マイページ</title>
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script>
</head>
<body>
    <div class="mypage-container">
        <h2>マイページ</h2>
        <div class="user-info">
            <p><strong>ユーザー名:</strong> {{ $user->name }} </p>
            
        </div>

        <div class="current-mood" id="currentMood">
            @if ($user->mood === '良い')
                😊
            @elseif ($user->mood === '普通')
                😐
            @elseif ($user->mood === '悪い')
                😟
            @else
                🤔
            @endif
        </div>

        <select id="moodSelect">
    <option value="😊">😊 元気</option>
    <option value="😐">😐 普通</option>
    <option value="😟">😟 体調悪い</option>
</select>
<button id="moodUpdateButton">更新</button>

<!-- 顔文字を表示する部分 -->
<div id="moodDisplay">
    <!-- ここに顔文字が表示されます -->
</div>

        <!-- カレンダー機能 -->
        <div id='calendar'></div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'ja',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    events: function(info, successCallback, failureCallback) {
                        fetch('/fetch-user-events')
                            .then(response => response.json())
                            .then(data => {
                                successCallback(data.map(event => ({
                                    id: event.id,
                                    title: event.title,
                                    start: event.held_datetime,
                                    end: event.end_time || null,
                                    // 他の必要なフィールドも追加
                                })));
                            })
                            .catch(failureCallback);
                    },
                    dateClick: function(info) {
                        window.location.href = '/events/' + info.dateStr; // 選択された日付のイベント一覧ページに遷移
                    },
                    eventClick: function(info) {
                        // イベントの開始日時に基づいて該当の日のイベントリストページに遷移
                        var eventDate = info.event.start.toISOString().split('T')[0]; // YYYY-MM-DD形式の日付を取得
                        window.location.href = '/events/' + eventDate;
                     }
                });
                calendar.render();
            });
        </script>


        <div class="navigation">
            <button onclick="location.href='{{ route('comms.index') }}'">コミュニティ</button>
            <button onclick="location.href='events.php'">イベント</button>
        </div>
    </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        
        console.log('CSRF Token:', token); // コンソールにトークンを表示
    });

        document.getElementById('moodUpdateButton').addEventListener('click', function() {
            const mood = document.getElementById('moodSelect').value;

            
            fetch('{{ route('mood.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    mood: mood
                })
            })
            .then(response => response.json())
            .then(data => {
                // 成功時の処理。たとえば、顔文字を変更するなど
                document.getElementById('moodDisplay').innerText = data.mood;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });

    </script>

</body>
</html>