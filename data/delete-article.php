<?php
require_once dirname(__FILE__) . '/connect-db.php';
require_once dirname(__FILE__) . '/admin/session.php';
require_once dirname(__FILE__) . '/delete-article-func.php';

ifUnSetDie($_GET['id']);
$input_id = $_GET['id'];

deleteArticle($input_id);

echo('記事の削除に成功。');
?>