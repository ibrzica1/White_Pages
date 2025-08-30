<?php

 session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
</head>

<body>
  <?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <p><?= $message ?></p>
    <?php unset($_SESSION["message"]); ?>
  <?php endif; ?>
  <form action="models/signupUser.php" method="POST">
      <input type="text" name="username" placeholder="Enter Username">
      <input type="email" name="email" placeholder="Enter Email">
      <input type="text" name="password" placeholder="Enter Password">
      <input type="text" name="repeatPassword" placeholder="Repeat Password">
      <button>Register</button>
  </form>  
</body>

</html>