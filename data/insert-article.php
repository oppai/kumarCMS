<?php

try {
	$db = new SQLite3('article.sqlite3');
} catch(Exception $e) {
	die('DBとの接続に失敗' . $e -> getTraceAsString());
}

$input_title = sqlite_escape_string($_POST['title']);
$input_body = sqlite_escape_string($_POST['body']);
$input_headimage = sqlite_escape_string($_POST['headimage']);
$input_rowid = sqlite_escape_string($_POST['rowid']);
$fts_tag = sqlite_escape_string($_POST['tag']);
// SQLiteに対する処理
if (empty($input_rowid)) {
	$sql = "insert into article (title, body, headimage) values('$input_title', '$input_body', '$input_headimage');";
} else {
	$sql = "update article set title = '$input_title', body = '$input_body', headimage = '$input_headimage' where rowid = $input_rowid;";
}
$result = $db -> query($sql);

if (!$result) {
	die($input_rowid . '記事のインサートクエリーに失敗: ' . $sqlerror);
}

// 分かち書きした文をタグ検索用テーブルへ
if (empty($input_rowid)) {
	$id_inserted = $db -> lastInsertRowId();
	$sql = "insert into fts_tag (rowid, tag) values($id_inserted, '$fts_tag');";
} else {
	$id_inserted = $input_rowid;
	$sql = "update fts_tag set tag = '$fts_tag' where rowid = $id_inserted;";
}
$result = $db -> query($sql);

if (!$result) {
	die('タグ検索用情報のインサートクエリーに失敗: ' . $sqlerror);
}

$db -> close();

if (empty($input_rowid))  {
	echo('記事「' . $input_title . '」の作成に成功');
} else {
	echo('記事「' . $input_title . '」の編集に成功');
}
?>