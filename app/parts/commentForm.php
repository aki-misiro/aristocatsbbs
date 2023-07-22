<?php
$position = 0;

if (isset($_POST["submitButton"])) {
   $position = $_POST["position"];
}

$name = $_POST['name'] ?? "";
?>

<form class="formWrapper" method="POST" autocomplete="off">
   <div class="createCommentForm">
      <input type="submit" value="書き込む" name="submitButton">
      <label>名前：</label>
      <input type="text" name="username" value="<?php if ($thread["id"] == $comment["thread_id"]) echo $_SESSION["username"]; ?>">
      <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
   </div>
   <div>
      <textarea class="commentTextArea" name="body"></textarea>
   </div>
   <!-- 位置取得用 -->
   <input type="hidden" name="position" value="0">
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(document).ready(() => {
      $("input[type=submit]").click(() => {
         // 現在のスクロール位置を取得
         let position = $(window).scrollTop();
         $("input:hidden[name=position]").val(position);
      })
      $(window).scrollTop(<?php echo $position; ?>);
   })
</script>