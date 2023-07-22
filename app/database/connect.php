<?php

$user = "aristocats_user";
$pass = "sF6588ino";

// DBと接続
try {
   $pdo = new PDO('mysql:host=localhost;dbname=aristocats_bbs', $user, $pass);
} catch (PDOException $error) {
   echo $error->getMessage();
}

?>