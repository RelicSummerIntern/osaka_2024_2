<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <p><strong>今日の体調:</strong> 😊</p>
        </div>
        <div class="mood-update">
            <h3>今日の体調を更新しましょう！</h3>
            <form action="update_mood.php" method="post">
                <label for="mood">体調</label>
                <select id="mood" name="mood">
                    <option value="😊">😊</option>
                    <option value="😐">😐</option>
                    <option value="😢">😢</option>
                    <option value="😠">😠</option>
                </select>
                <button type="submit">更新</button>
            </form>
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
            <button onclick="location.href='events.php'">チャット</button>
        </div>
    </div>
</body>
</html>
