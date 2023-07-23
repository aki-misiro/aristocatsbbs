<?php
function connect()
{
   $user = "aristocats_user";
   $pass = "sF6588ino";

   // DBと接続
   try {
      $pdo = new PDO('mysql:host=localhost;dbname=aristocats_bbs', $user, $pass);
      return $pdo;
   } catch (PDOException $error) {
      echo $error->getMessage();
      exit();
   }
}
?>