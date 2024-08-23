<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コミュニティ{{ $comm_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .community-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }
        .members-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .member-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .member-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .member-item h1 {
            font-size: 16px;
            margin: 0;
        }
        .chat-list {
            margin-bottom: 20px;
        }
        .chat-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .chat-item.mine {
            justify-content: flex-end;
        }
        .chat-item.others {
            justify-content: flex-start;
        }
        .chat-text {
            background-color: #e0f7fa;
            border-radius: 15px;
            padding: 10px;
            max-width: 80%;
            word-wrap: break-word;
        }
        .chat-text.mine {
            background-color: #d1c4e9;
        }
        .chat-time {
            font-size: 12px;
            color: #888;
            white-space: nowrap;
        }
        .chat-author {
            font-weight: bold;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
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
    </style>
     <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden; /* 横スクロールの防止 */
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
        .alert-success {
            background-color: #d4edda; /* 背景色 */
            color: #155724;            /* 文字色 */
            border: 1px solid #c3e6cb; /* 枠線 */
            font-size: 1.5em;   /* テキストサイズを大きく */
            margin: 20px auto;  /* 上下に余白を追加して中央に配置 */
        }
    </style>
</head>
<body>
    <div class="community-container">        
        <!-- コミュニティの掲示板 -->
        <h2>掲示板</h2>
        <div class="chat-list">
            @foreach ($commchat->reverse() as $chat) <!-- 逆順にする -->
                <div class="chat-item {{ $chat->user_id == Auth::id() ? 'mine' : 'others' }}">
                    @if ($chat->user_id != Auth::id())
                        <div class="chat-author">{{ $chat->user->name }} さん</div>
                    @endif
                    <div class="chat-text {{ $chat->user_id == Auth::id() ? 'mine' : '' }}">
                        {{ $chat->text }}
                    </div>
                    <div class="chat-time">
                        {{ $chat->created_at->diffForHumans() }}
                    </div>
                </div>
            @endforeach
        </div>
        <!-- コミュニティのメンバリスト -->
        <h2>メンバー一覧</h2>
        <div class="members-list">
            @foreach ($members as $member)
                <div class="member-item {{ $member->id == Auth::id() ? 'self' : '' }}">
                    <!-- プロフィール画像（仮のURL、実際にはユーザーの画像URLを使用） -->
                    <img src="{{ $member->profile_picture_url ?? 'path/to/default/profile.jpg' }}" alt="{{ $member->name }} さんのプロフィール画像">
                    <h1>{{ $member->name }} さん</h1>
                </div>
            @endforeach
        </div>

        <!-- イベント作成フォーム -->
        <div class="event-create">
            <h3>イベント作成</h3>
            <form action="/create-event" method="post">
                @csrf
                <label for="title">イベント名:</label>
                <input type="text" id="title" name="title" required>
                
                <label for="held_datetime">開始日時:</label>
                <input type="datetime-local" id="held_datetime" name="held_datetime" required>
                
                <label for="end_time">終了日時:</label>
                <input type="datetime-local" id="end_time" name="end_time">
                
                <label for="held_place">場所:</label>
                <input type="text" id="held_place" name="held_place">

                <!-- comm_id を hidden フィールドで送信 -->
                <input type="hidden" name="comm_id" value="{{ $comm_id }}">
                
                <button type="submit">作成</button>
            </form>
        </div>
        <!-- 登録時メッセージ表示部分 -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="navigation">
            <button onclick="location.href='{{ url('/mypage') }}'">マイページ</button>
            <button onclick="location.href='{{ url('/events') }}'">イベント</button>
        </div>


    </div>
</body>
</html>
