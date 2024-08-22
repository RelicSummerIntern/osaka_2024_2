<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>イベント詳細</title>
    <link rel="stylesheet" href="styles.css"> <!-- 必要に応じてスタイルシートをリンク -->
</head>
<body>
    <header>
        <h1>イベント詳細ページ</h1>
        <!-- ナビゲーションバーなど共通のヘッダーがある場合はここに追加 -->
    </header>

    <main>
        <?php if (isset($events) && !empty($events)): ?>
            <?php foreach ($events as $event): ?>
                <h2><?php echo htmlspecialchars($event->title); ?></h2> <!-- イベントのタイトル -->
                <p><?php echo nl2br(htmlspecialchars($event->description)); ?></p> <!-- イベントの説明 -->
                <p>開始日時: <?php echo htmlspecialchars($event->start_time); ?></p> <!-- 開始日時 -->
                <p>終了日時: <?php echo htmlspecialchars($event->end_time); ?></p> <!-- 終了日時 -->
                <p>場所: <?php echo htmlspecialchars($event->location); ?></p> <!-- 場所 -->
            <?php endforeach; ?>
        <?php else: ?>
            <p>表示するイベントがありません。</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 イベント管理システム</p>
        <!-- フッターには著作権表示や追加リンクなどを含めることができます -->
    </footer>
</body>
</html>
