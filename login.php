<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  
  <?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <p><?=  $message ?></p>
    <?php unset($_SESSION["message"]); ?>
  <?php endif; ?>

  <form action="models/loginUser.php" method="POST">
      <input type="text" name="email" placeholder="Email">
      <input type="text" name="password" placeholder="Password">
      <button>Login</button>
  </form>
  
</body>

</html>