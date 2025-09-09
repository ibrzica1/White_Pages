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

require_once "models/Business.php";

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
</head>

<body>
  
<?php if(isset($_SESSION["message"])): ?>
    <?php $message = htmlspecialchars($_SESSION["message"]); ?>
    <p><?=  $message ?></p>
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
    <div class="business_id-container">
      <div class="business_id-display">
        <h3>Business ID: <span><?=$business['business_id']?></span></h3>
        <button onclick="showEditForm('business_id')">Edit</button>
      </div>

      <div class="business_id-edit-form" style="display: none;">
        <form action="models/updateBusiness.php" method="post">
          <input type="hidden" name="field" value="business_id">
          <input type="text" name="newBusiness_id" placeholder="<?=$business['business_id']?>">
          <button type="submit">Save</button>
          <button type="button" onclick="hideEditForm('business_id')">Cancel</button>
        </form>
      </div>
    </div>

    <div class="name-container">
      <div class="name-display">
        <h3>Name: <span><?=$business['name']?></span></h3>
        <button onclick="showEditForm('name')">Edit</button>
      </div>

      <div class="name-edit-form" style="display: none;">
        <form action="models/updateBusiness.php" method="post">
          <input type="hidden" name="field" value="name">
          <input type="text" name="newName" placeholder="<?=$business['name']?>">
          <button type="submit">Save</button>
          <button type="button" onclick="hideEditForm('name')">Cancel</button>
        </form>
      </div>
    </div>

    <div class="address-container">
      <div class="address-display">
        <h3>Address: <span><?=$business['address']?></span></h3>
        <button onclick="showEditForm('address')">Edit</button>
      </div>

      <div class="address-edit-form" style="display: none;">
        <form action="models/updateBusiness.php" method="post">
          <input type="hidden" name="field" value="address">
          <input type="text" name="newAddress" placeholder="<?=$business['address']?>">
          <button type="submit">Save</button>
          <button type="button" onclick="hideEditForm('address')">Cancel</button>
        </form>
      </div>
    </div>

    <div class="founded-container">
      <div class="founded-display">
        <h3>Founded: <span><?=$business['founded']?></span></h3>
        <button onclick="showEditForm('founded')">Edit</button>
      </div>

      <div class="founded-edit-form" style="display: none;">
        <form action="models/updateBusiness.php" method="post">
          <input type="hidden" name="field" value="founded">
          <input type="text" name="newFounded" placeholder="<?=$business['founded']?>">
          <button type="submit">Save</button>
          <button type="button" onclick="hideEditForm('founded')">Cancel</button>
        </form>
      </div>
    </div>

    <div class="employees-container">
      <div class="employees-display">
        <h3>Employees: <span><?=$business['employees']?></span></h3>
        <button onclick="showEditForm('employees')">Edit</button>
      </div>

      <div class="employees-edit-form" style="display: none;">
        <form action="models/updateBusiness.php" method="post">
          <input type="hidden" name="field" value="employees">
          <input type="text" name="newEmployees" placeholder="<?=$business['employees']?>">
          <button type="submit">Save</button>
          <button type="button" onclick="hideEditForm('employees')">Cancel</button>
        </form>
      </div>
    </div>

    <div class="revenue-container">
      <div class="revenue-display">
        <h3>Revenue: <span><?=$business['revenue']?></span></h3>
        <button onclick="showEditForm('revenue')">Edit</button>
      </div>

      <div class="revenue-edit-form" style="display: none;">
        <form action="models/updateBusiness.php" method="post">
          <input type="hidden" name="field" value="revenue">
          <input type="text" name="newRevenue" placeholder="<?=$business['revenue']?>">
          <button type="submit">Save</button>
          <button type="button" onclick="hideEditForm('revenue')">Cancel</button>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<script>
  function showEditForm(field)
  {
    document.querySelector(`.${field}-display`).style.display = 'none';
    document.querySelector(`.${field}-edit-form`).style.display = 'block';
  }

  function hideEditForm(field)
  {
    document.querySelector(`.${field}-display`).style.display = 'block';
    document.querySelector(`.${field}-edit-form`).style.display = 'none';
  }
</script>

</body>

</html>