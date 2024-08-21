<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>マイページ</title>
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
    <style>
        /* スクロール可能なリストのスタイル */
        .community-list {
            max-height: 400px; /* 最大高さ */
            overflow-y: auto; /* 垂直方向にスクロール */
            border: 1px solid #ccc; /* ボーダーの追加 */
            padding: 10px; /* 内側の余白 */
            margin-top: 20px; /* 上部の余白 */
            border-radius: 5px; /* 角を丸める */
        }
        .community-item {
            padding: 10px; /* 内側の余白 */
            border-bottom: 1px solid #eee; /* ボーダーの追加 */
        }
        .community-item:last-child {
            border-bottom: none; /* 最後のアイテムのボーダーを削除 */
        }
        .community-item a {
            text-decoration: none; /* リンクの下線を削除 */
            color: #333; /* リンクのテキストカラー */
            display: block; /* ブロック表示にして全体をクリック可能にする */
        }
        .community-item a:hover {
            background-color: #f0f0f0; /* ホバー時の背景色 */
            padding: 10px; /* 内側の余白 */
            border-radius: 5px; /* 角を丸める */
        }
    </style>
</head>
<body>
    <div class="communities-container">
        
        <h2>コミュニティ一覧</h2>
        <div class="user-info">
            <p><strong>ユーザー名:</strong> {{ $user->name }} </p>
        </div>
        <!-- コミュニティリスト -->
         
        <div class="communities-list">
            @foreach ($comms as $community)
                <div class="community-item">
                    <a href="{{ url('/community/' . $community->id . '/enter') }}">
                        {{ $community->name }}
                    </a>
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