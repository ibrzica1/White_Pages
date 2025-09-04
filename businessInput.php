<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(!isset($_SESSION["logged"]))
{
  header("Location: index.php");
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>business Register</title>
</head>

<body>

    <?php if(isset($_SESSION["message"])): ?>
      <?php $message = htmlspecialchars($_SESSION["message"]); ?>
      <p><?= $message ?></p>
      <?php unset($_SESSION["message"]); ?>
    <?php endif; ?>
  
    <form action="models/registerBusiness.php" method="post">
        <input type="text" name="business_id" placeholder="Business Id">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="address" placeholder="Address">
        <input type="date" name="founded" placeholder="Founded">
        <input type="text" name="employees" placeholder="Employees">
        <input type="text" name="revenue" placeholder="Revenue">
        <button>Register</button>
    </form>

</body>

</html>
