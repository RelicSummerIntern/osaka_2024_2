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
            max-width: 800px; /* デスクトップ向けの幅 */
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        h2 {
            font-size: 32px; /* フォントサイズを大きく */
            color: #007bff;
            margin-bottom: 20px;
        }
        .user-info {
            margin-bottom: 20px;
        }
        .user-info p {
            font-size: 18px; /* フォントサイズを大きく */
            margin: 5px 0;
        }
        .mood-update {
            margin-bottom: 20px;
            background: #e0f7fa;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .mood-update h3 {
            font-size: 24px; /* フォントサイズを大きく */
            margin-bottom: 10px;
        }
        .mood-update label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .mood-update select, .mood-update button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .mood-update button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .mood-update button:hover {
            background-color: #0056b3;
        }
        #calendar {
            margin-top: 20px;
        }
        .navigation {
            display: flex;
            justify-content: space-between; /* 横並びにする */
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
            font-size: 18px; /* フォントサイズを大きく */
            flex: 1; /* ボタンを均等に広げる */
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
