<html>
	<head>
		<title>テーブル作成</title>
	</head>
	<body>

		<?php

		try {
			$db = new SQLite3('article.sqlite3');
		} catch(Exception $e) {
			echo 'DBとの接続に失敗';
			die($e -> getTraceAsString());
		}

		print('接続に成功しました。<br>');

		// SQLiteに対する処理
		// 通常のテーブルを作る
		$sql = "create table article (id integer primary key autoincrement, timestamp default(datetime('now', 'localtime')), title, body, thumbbody, headimage);";
		$result = $db -> query($sql);

		if (!$result) {
			die('通常のテーブル作成クエリーに失敗: ' . $sqlerror);
		}
		print('通常テーブルの作成に成功。');
		// タグ検索用のテーブルを作る
		$sql = "create virtual table fts_tag using fts4(fts_id integer primary key autoincrement, tag text);";
		$result = $db -> query($sql);

		if (!$result) {
			die('タグ検索テーブル作成クエリーに失敗: ' . $sqlerror);
		}
		print('タグ検索テーブルの作成に成功。');
		
		// タグ検索用のテーブルを閲覧するテーブルを作る
		$sql = "create virtual table aux_article using fts4aux(fts_tag);";
		$result = $db -> query($sql);

		if (!$result) {
			die('タグ検索テーブルを閲覧するテーブル作成クエリーに失敗: ' . $sqlerror);
		}
		print('タグ検索テーブルを閲覧するテーブルの作成に成功。');
		
		$db -> close;

		print('切断しました。<br>');
	?>
	<a href="../">トップページへ</a>
</body>
</html>