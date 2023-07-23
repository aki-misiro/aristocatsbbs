<?php
$comment_array = array();

// コメントデータをテーブルから取得してくる。
$sql = "SELECT * FROM comment";
$statement = connect()->prepare($sql);
$statement->execute($comment_array);

$comment_array = $statement;
?>