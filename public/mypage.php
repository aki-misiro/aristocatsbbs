<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';

// ログインしているか判定し、していなかったらログイン画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
   $_SESSION['login_err'] = 'ログインしてください。';
   header('Location: login_form.php');
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
</head>
<body>
<p>ログインユーザー：<?php echo h($login_user['name']) ?></p>
<a href="https://aristocats.xsrv.jp/">掲示板へ</a>
<a href="./login.php">ログアウト</a>
</body>
</html>