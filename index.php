<?php
session_start();

require_once  __DIR__.'/classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result) {
  header('Location: public/mypage.php');
  return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);

$err = $_SESSION;

// セッションを消す
$_SESSION = array();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掲示板ログイン画面</title>
</head>
<body>
   <h2>掲示板ログインフォーム</h2>
   <?php if (isset($login_err)) : ?>
      <p><?php echo $login_err; ?></p>
   <?php endif; ?>
   <?php if (isset($err['msg'])) : ?>
      <p><?php echo $err['msg']; ?></p>
   <?php endif; ?>
  <form action="public/login.php" method="POST">
      <p>
         <label for="email">メールアドレス：</label>
         <input type="email" name="email">
         <?php if (isset($err['email'])) : ?>
            <p><?php echo $err['email']; ?></p>
         <?php endif; ?>
      </p>
      <p>
         <label for="password">パスワード：</label>
         <input type="password" name="password">
         <?php if (isset($err['password'])) : ?>
            <p><?php echo $err['password']; ?></p>
         <?php endif; ?>
      </p>
      <p>
         <input type="submit" value="ログイン">
      </p>
  </form>
  <a href="https://aristocats.site/">ホームに戻る</a>
</body>
</html>