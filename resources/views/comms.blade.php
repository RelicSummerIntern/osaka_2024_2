<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>コミュニティ一覧</title>
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .mypage-container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        h2 {
            font-size: 32px;
            color: #007bff;
            margin-bottom: 20px;
        }
        .user-info {
            margin-bottom: 20px;
        }
        .user-info p {
            font-size: 18px;
            margin: 5px 0;
        }
        .community-list {
            display: flex;
            flex-direction: column;
            gap: 20px; /* 項目間のスペースを追加 */
        }
        .community-item {
            background: #e0f7fa;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .community-item:hover {
            transform: scale(1.05);
        }
        .community-item a {
            text-decoration: none;
            color: #007bff;
            font-size: 24px; /* フォントサイズを大きく */
            font-weight: bold;
        }
        .navigation {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }
        .navigation button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            cursor: pointer;
            font-size: 18px;
            flex: 1;
        }
        .navigation button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="mypage-container">
        <h2>コミュニティ一覧</h2>
        <div class="user-info">
            <p><strong>ユーザー名:</strong> {{ $user->name }} </p>
        </div>
        <!-- コミュニティリスト -->
        <div class="community-list">
            @foreach ($comms as $community)
                <div class="community-item">
                    <a href="{{ url('/community/' . $community->id . '/enter') }}">
                        {{ $community->name }}
                    </a>
                </div>
            @endforeach
        </div>

        <div class="navigation">
            <button onclick="location.href='{{ route('mypage') }}'">マイページ</button>
            <button onclick="location.href='events.php'">イベント</button>
        </div>
    </div>
</body>
</html>
