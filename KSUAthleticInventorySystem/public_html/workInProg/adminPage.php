<?php 
session_start();
include_once 'functions.php';
include_once 'imports.php';
include_once '/home/capstone/DatabaseInformation/connectToDatabase.php';
include_once '/home/capstone/DatabaseInformation/dataBaseFunc.php';

if (checkPermission($conn) != "Admin"){ logout(); }


$result = selectActiveAccounts($conn);
$result2 = selectInactiveAccounts($conn);
$result3 = selectDeletedAccounts($conn);


if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['denyAcct']))
    {
        denyRequest($conn, $_POST["accountID"]);
    }

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['acceptAcct']))
    {
        acceptRequest($conn, $_POST["accountID2"]);
    }

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['changeToAdmin']))
    {
        changeToAdmin($conn, $_POST["accountID"]);
    }

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['changeToManager']))
    {
        changeToManager($conn, $_POST["accountID"]);
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['moveToDelete']))
    {
        moveToDelete($conn, $_POST["accountID3"]);
    }
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['reinstateAccount']))
    {
        reinstateAccount($conn, $_POST["accountID"]);
    }
?>


<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="Website.css">
<body>
<table class="tablelogo">
    <tr>
        <td>
            <div>
        </div>    
        <div>
            <form action="index.php" method="POST">
                <button type="submit" class="btn buttonBack">Back <i class="fa-solid fa-square-caret-left"></i></button>
            </form>
            <!--logout button-->
            <form method = 'post' action = 'index.php'>
              <button type="submit" class="btn buttonBk" name="logout">Log Out <i class="fa-solid fa-arrow-right-from-bracket"></i></button>
            </form>
        </div>
        </td>
    </tr>
</table>
</body>
<body>
<table class="table">
        <thead>
            <tr>
                <th> Delete Account </th>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Permission Level</th>
                
            </tr>

<?php
echo '<h1>Active Accounts</h1>';
if (mysqli_num_rows($result) > 0) {
  
?><tr><?php

  while($row = mysqli_fetch_assoc($result)) {
	  ?><td>
          <?php if ($row["perm"] == 0) { ?>
        <form method = 'post' action = 'adminPage.php'>
        <button type="submit" class="btn btn-outline-danger" name ="moveToDelete">
        <i class="bi bi-trash"></i> 
        </button>
        <input type='hidden' id='accountID3' name='accountID3' value= <?php echo $row['id'];?> >
        </form>
        <?php }?></td>
            <td><?php echo $row["id"];?></td>
            <td><?php echo $row["first_name"];?></td>
	          <td><?php echo $row["last_name"];?></td>
	          <td><?php echo $row["email"];?></td>
            <td><?php if ($row["perm"] == 1) echo "Admin";
                      else echo "Manager";?><td>
            <td> 
            <?php 
                     if ($_SESSION['id'] == $row["id"])
                         echo "This is you";
                     
             
                     else if ($row["perm"] == 1) { ?>
                    <form method = 'post' action = 'adminPage.php'>
                    <button type = 'submit' name = 'changeToManager' class="btn buttonBack" value = 'Make Manager'>Make Manager </button>
                    <input type='hidden' id='accountID' name='accountID' value= <?php echo $row['id'];?> >
                    </form>
             <?php }
                    else { ?>
                    <form method = 'post' action = 'adminPage.php'>
                    <button type = 'submit' name = 'changeToAdmin' class="btn buttonAdmin" value = 'Make Admin'>Make Admin </button>
                    <input type='hidden' id='accountID' name='accountID' value= <?php echo $row['id'];?> >
                    </form>
             <?php } ?>
             </td>
    </tr><?php
    }
}
?>
<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
<?php
echo '<h1>Pending Accounts</h1>';
if (mysqli_num_rows($result2) > 0) {
    
  ?><tr><?php
  
    while($row = mysqli_fetch_assoc($result2)) {
        ?><td><?php echo $row["id"];?></td>
          <td><?php echo $row["first_name"];?></td>
          <td><?php echo $row["last_name"];?></td>
          <td><?php echo $row["email"];?></td>

          <td>              <form method = 'post' action = 'adminPage.php'>
                            <button type = 'submit' name = 'denyAcct' class="btn buttondelete" value = 'Deny Request'>Deny Request </button>
                            <input type='hidden' id='accountID' name='accountID' value= <?php echo $row['id'];?> >
                            </form></td>

          <td>              <form method = 'post' action = 'adminPage.php'>
                            <button type = 'submit' name = 'acceptAcct' class="btn buttonBack" value = 'Approve Request'>Approve Request </button>
                            <input type='hidden' id='accountID2' name='accountID2' value= <?php echo $row['id'];?> > 
                            </form></td>
      </tr><?php
      }
  }

?>

<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
<?php
echo '<h1>Accounts To Be Deleted</h1>';
if (mysqli_num_rows($result3) > 0) {
    
  ?><tr><?php
  
    while($row = mysqli_fetch_assoc($result3)) {
        ?><td><?php echo $row["account_id"];?></td>
          <td><?php echo $row["first_name"];?></td>
          <td><?php echo $row["last_name"];?></td>
          <td><?php echo $row["email"];?></td>

          <td>              <form method = 'post' action = 'adminPage.php'>
                            <button type = 'submit' name = 'reinstateAccount' class="btn buttonBack" value = 'Reinstate Account'>Reinstate Account </button>
                            <input type='hidden' id='accountID' name='accountID' value= <?php echo $row['account_id'];?> >
                            </form></td>

          
      </tr><?php
      }
  }

?>
</body>
</html> 