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
</head>
<body>
    <div class="community-container">
        <!-- コミュニティのメンバリスト -->
        <h2>メンバー一覧</h2>
        <div class="members-list">
            @foreach ($members as $member)
                <div class="member-item">
                    <!-- プロフィール画像（仮のURL、実際にはユーザーの画像URLを使用） -->
                    <!-- <img src="{{ $member->profile_picture_url ?? 'path/to/default/profile.jpg' }}" alt="{{ $member->name }}"> -->
                    <h1>{{ $member->name }} さん</h1>
                </div>
            @endforeach
        </div>
        
        <!-- コミュニティの掲示板 -->
        <h2>掲示板</h2>
        <div class="chat-list">
            @foreach ($commchat as $chat)
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

        <div class="navigation">
            <button onclick="location.href='{{ url('/mypage') }}'">マイページ</button>
            <button onclick="location.href='{{ url('/events') }}'">イベント</button>
        </div>
    </div>
</body>
</html>
