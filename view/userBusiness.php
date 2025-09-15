<?php

if(session_status() == PHP_SESSION_NONE)
{
  session_start();
}

if(!isset($_SESSION["logged"]))
{
  header("Location: ../index.php");
  exit();
}

require_once "../models/Business.php";

$userId = $_SESSION["id"];
$business = new Business();
$userBusiness = $business->getBusinessByUserId($userId);


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Business</title>
  <link rel="stylesheet" href="../style/header.css">
  <link rel="stylesheet" href="../style/userBusiness.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>

  <div class="header-main-container">
      <div class="logo">
        <a href="../index.php">
          <img src="../images\White-Pages-Logo.png">
        </a>
      </div>

      <div class="user-header">
      <div>
      <a href="businessInput.php" class="register-btn">Register<br>Business</a>
     </div>
     <div class="user-wrapper">
      <a href="userPage.php" class="user-link"><?= $_SESSION["username"] ?></a>
      <a href="../controllers/logout.php" class="user-logout">Logout</a>
     </div>
    </div>
  </div>

  <div class="user-business-body">

    <?php if(isset($_SESSION["message"])): ?>
        <?php $message = htmlspecialchars($_SESSION["message"]); ?>
        <p class="message"><?=  $message ?></p>
        <?php unset($_SESSION["message"]); ?>
    <?php endif; ?>

    <?php if(empty($userBusiness)): ?>
      <?php 
      $_SESSION["message"] = "There is no registered business";
      header("Location: userPage.php");
      exit(); 
      ?>
    <?php else: ?>
      <?php foreach($userBusiness as $business): ?>

        <div class="user-business">

        <div class="business_id-container">
          <h3>Business ID</h3>
          <div class="business_id-display">
            <img src="../images\fingerprint.png">
            <p><?=$business['business_id']?></p>
            <button onclick="showEditForm(this.closest('.user-business'),'business_id')" class="edit-btn">Edit</button>
          </div>

          <div class="business_id-edit-form" style="display: none;">
            <form action="../controllers/updateBusiness.php" method="post" class="business_id-form">
              <input type="hidden" name="field" value="business_id">
              <input type="hidden" name="id" value="<?=$business["id"]?>">
              <img src="../images\fingerprint.png">
              <input type="text" name="newBusiness_id" placeholder="<?=$business['business_id']?>">
              <button type="submit"  class="save-btn">Save</button>
              <button type="button" onclick="hideEditForm(this.closest('.user-business'),'business_id')" class="cancel-btn">Cancel</button>
            </form>
          </div>
        </div>

        <div class="name-container">
          <h3>Name</h3>
          <div class="name-display">
            <img src="../images\briefcase.png">
            <p><?=$business['name']?></p>
            <button onclick="showEditForm(this.closest('.user-business'),'name')" class="edit-btn">Edit</button>
          </div>

          <div class="name-edit-form" style="display: none;">
            <form action="../controllers/updateBusiness.php" method="post" class="name-form">
              <input type="hidden" name="field" value="name">
              <input type="hidden" name="id" value="<?=$business["id"]?>">
              <img src="../images\briefcase.png">
              <input type="text" name="newName" placeholder="<?=$business['name']?>">
              <button type="submit" class="save-btn">Save</button>
              <button type="button" onclick="hideEditForm(this.closest('.user-business'),'name')" class="cancel-btn">Cancel</button>
            </form>
          </div>
        </div>

        <div class="address-container">
          <h3>Address</h3>
          <div class="address-display">
            <img src="../images\location.png">
            <p><?=$business['address']?></p>
            <button onclick="showEditForm(this.closest('.user-business'),'address')" class="edit-btn">Edit</button>
          </div>

          <div class="address-edit-form" style="display: none;">
            <form action="../controllers/updateBusiness.php" method="post" class="address-form">
              <input type="hidden" name="field" value="address">
              <input type="hidden" name="id" value="<?=$business["id"]?>">
              <img src="../images\location.png">
              <input type="text" name="newAddress" placeholder="<?=$business['address']?>">
              <button type="submit" class="save-btn">Save</button>
              <button type="button" onclick="hideEditForm(this.closest('.user-business'),'address')" class="cancel-btn">Cancel</button>
            </form>
          </div>
        </div>

        <div class="founded-container">
          <h3>Founded</h3>
          <div class="founded-display">
            <img src="../images\pantheon.png">
            <p><?=$business['founded']?></p>
            <button onclick="showEditForm(this.closest('.user-business'),'founded')" class="edit-btn">Edit</button>
          </div>

          <div class="founded-edit-form" style="display: none;">
            <form action="../controllers/updateBusiness.php" method="post" class="founded-form">
              <input type="hidden" name="field" value="founded">
              <input type="hidden" name="id" value="<?=$business["id"]?>">
              <img src="../images\pantheon.png">
              <input type="date" name="newFounded" placeholder="<?=$business['founded']?>">
              <button type="submit" class="save-btn">Save</button>
              <button type="button" onclick="hideEditForm(this.closest('.user-business'),'founded')" class="cancel-btn">Cancel</button>
            </form>
          </div>
        </div>

        <div class="employees-container">
          <h3>Employees</h3>
          <div class="employees-display">
            <img src="../images\employee.png">
            <p><?=$business['employees']?></p>
            <button onclick="showEditForm(this.closest('.user-business'),'employees')" class="edit-btn">Edit</button>
          </div>

          <div class="employees-edit-form" style="display: none;">
            <form action="../controllers/updateBusiness.php" method="post" class="employees-form">
              <input type="hidden" name="field" value="employees">
              <input type="hidden" name="id" value="<?=$business["id"]?>">
              <img src="../images\employee.png">
              <input type="text" name="newEmployees" placeholder="<?=$business['employees']?>">
              <button type="submit" class="save-btn">Save</button>
              <button type="button" onclick="hideEditForm(this.closest('.user-business'),'employees')" class="cancel-btn">Cancel</button>
            </form>
          </div>
        </div>

        <div class="revenue-container">
          <h3>Revenue</h3>
          <div class="revenue-display">
            <img src="../images\salary.png">
            <p><?=$business['revenue']?></p>
            <button onclick="showEditForm(this.closest('.user-business'),'revenue')" class="edit-btn">Edit</button>
          </div>

          <div class="revenue-edit-form" style="display: none;">
            <form action="../controllers/updateBusiness.php" method="post" class="revenue-form">
              <input type="hidden" name="field" value="revenue">
              <input type="hidden" name="id" value="<?=$business["id"]?>">
              <img src="../images\salary.png">
              <input type="text" name="newRevenue" placeholder="<?=$business['revenue']?>">
              <button type="submit" class="save-btn">Save</button>
              <button type="button" onclick="hideEditForm(this.closest('.user-business'),'revenue')" class="cancel-btn">Cancel</button>
            </form>
          </div>
        </div>

        <div class="delete-btn-container">
          <form action="../controllers/deleteBusiness.php" method="post" onsubmit="return confirm('Are you sure you want do delete <?=$business['name']?>')">
            <input type="hidden" name="delete" value="<?=$business["id"]?>">
            <button>Delete Business</button>
          </form>
        </div>

        </div>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>
  


<script>
  function showEditForm(parent, field)
  {
    parent.querySelector(`.${field}-display`).style.display = 'none';
    parent.querySelector(`.${field}-edit-form`).style.display = 'flex';
  }

  function hideEditForm(parent, field)
  {
    parent.querySelector(`.${field}-display`).style.display = 'flex';
    parent.querySelector(`.${field}-edit-form`).style.display = 'none';
  }
</script>

</body>

</html>