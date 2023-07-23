<?php
session_start();
require_once __DIR__.'/../classes/UserLogic.php';
require_once __DIR__.'/../functions.php';

// ログインしているか判定し、していなかったらログイン画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
   $_SESSION['login_err'] = 'ログインしてください。';
   header('Location: ../index.php');
   return;
}

$login_user = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>猫のつれづれ掲示板</title>
   <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
   <p>ログインユーザー：<?php echo h($login_user['name']) ?></p>
   <form action="logout.php" method="POST">
      <input type="submit" name="logout" value="ログアウト">
   </form>
   <?php include("../app/parts/header.php"); ?>
   <?php include("../app/parts/validation.php"); ?>
   <?php include("../app/parts/thread.php") ; ?>
   <?php include("../app/parts/newThreadButton.php") ; ?>
</body>
</html>