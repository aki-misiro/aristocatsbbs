<?php
$thread_array = array();

// スレッドデータをテーブルから取得してくる。
$sql = "SELECT * FROM thread";
$statement = connect()->prepare($sql);
$statement->execute($thread_array);

$thread_array = $statement;
?>