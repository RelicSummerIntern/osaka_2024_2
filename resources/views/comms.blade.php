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

            margin-bottom: 20px;
        }
        .community-item {
            margin-bottom: 10px;
            font-size: 18px;
        }
        .community-item a {
            color: #007bff;
            text-decoration: none;
        }
        .community-item a:hover {
            text-decoration: underline;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .search-bar input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }
        .search-bar button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }
        .search-bar button:hover {
            background-color: #0056b3;
        }
        .search-results {
            margin-bottom: 20px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .search-results .result-item {
            margin-bottom: 10px;
            font-size: 18px;
        }
        .search-results .result-item a {
            color: #007bff;
            text-decoration: none;
        }
        .search-results .result-item a:hover {
            text-decoration: underline;

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

        <!-- 検索フォーム -->
        <div class="search-bar">
            <input type="text" placeholder="検索 (ex ...テニス)" id="searchQuery">
            <button onclick="searchCommunity()">検索</button>
        </div>

        <!-- 検索結果リスト -->
        <div class="search-results" id="searchResults">
            <!-- 検索結果がここに表示されます -->
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

    <script>
        function searchCommunity() {
            const query = document.getElementById('searchQuery').value;
            // AJAXリクエストなどで検索を行い、結果を表示する処理を追加できます。
            document.getElementById('searchResults').innerHTML = `<div class="result-item">検索結果: ${query}</div>`;
        }
    </script>
</body>
</html>
