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
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .community-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }
        .members-list, .chat-list {
            margin-top: 10px;
        }
        .member-item, .chat-item {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .chat-item {
            display: flex;
            flex-direction: column;
        }
        .chat-item h1 {
            font-size: 1rem;
            margin: 0;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .navigation button {
            background-color: #007bff; 
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }
        .navigation button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="community-container">
        <!-- コミュニティのメンバリスト -->
        <h2>メンバー一覧</h2>
        <div class="members-list">
            @foreach ($members as $member)
                <div class="member-item">
                    <h1>{{ $member->name }} さん</h1>
                </div>
            @endforeach
        </div>
        
        <!-- コミュニティの掲示板 -->
        <h2>掲示板</h2>
        <div class="chat-list">
            @foreach ($commchat as $chat)
                <div class="chat-item">
                    <h1>
                        {{ $chat->user->name }} さん<br>
                        「{{ $chat->text }}」<br>
                        <span style="font-size: 0.8rem; color: #888;">{{ $chat->created_at->diffForHumans() }}</span>
                    </h1>
                </div>
            @endforeach
        </div>

        <div class="navigation">
            <button onclick="location.href='{{ url('/mypage') }}'">マイページ</button>
            <button onclick="location.href='{{ url('/events') }}'">イベント</button>
        </div>
    </div>
</body>
</html>
