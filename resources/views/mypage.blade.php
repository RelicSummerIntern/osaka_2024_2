
<!-- スマホアプリ用のHTML -->
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
            <!-- <p><strong>メールアドレス:</strong> superOjichan123@example.com</p> -->
            <p><staitrong>今日の:体調</strong> 😊</p>
        </div>
        <div class="mood-update">
            <h3>今日の体調を更新しましょう！</h3>
            <form action="update_mood.php" method="post">
                <label for="mood">気分</label>
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
                    events: '/fetch-events',
                    dateClick: function(info) {
                        window.location.href = '/events/' + info.dateStr; // 選択された日付のイベント一覧ページに遷移
                    },
                    eventClick: function(info) {
                        window.location.href = '/events/' + info.event.id; // クリックされたイベントの詳細ページに遷移
                    }
                });
                calendar.render();
            });

        </script>
        
        <!-- イベント作成フォーム -->

        <div class="event-create">
            <h3>イベント作成</h3>
            <form action="/create-event" method="post">
                @csrf
                <label for="title">イベント名:</label>
                <input type="text" id="title" name="title" required>
                
                <label for="description">詳細:</label>
                <textarea id="description" name="description"></textarea>
                
                <label for="start_time">開始日時:</label>
                <input type="datetime-local" id="start_time" name="start_time" required>
                
                <label for="end_time">終了日時:</label>
                <input type="datetime-local" id="end_time" name="end_time">
                
                <label for="location">場所:</label>
                <input type="text" id="location" name="location">
                
                <button type="submit">作成</button>
            </form>
        </div>


            


        <div class="navigation">
            <button onclick="location.href='{{ route('comms.index') }}'">コミュニティ</button>
            <button onclick="location.href='events.php'">イベント</button>
        </div>
    </div>
</body>
</html>
