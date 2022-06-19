<?php
//оновлення конференції за її ID
include_once 'database.php';
require_once("database.php");
require_once("conference.php");
if(count($_POST)>0) {
mysqli_query($link,"UPDATE conference set id='" . $_POST['id'] . "', title='" . $_POST['title'] . "', date='" . $_POST['date'] . "', latitude='" . $_POST['latitude'] . "' ,longitude='" . $_POST['longitude'] ."',country='" . $_POST['country']. "' WHERE id='" . $_POST['id'] . "'");
Header("Location:detail_conf.php");

}
$result = mysqli_query($link,"SELECT * FROM conference WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Conference</title>
</head>
<body>
<style>
            a{
                color:black;
                text-decoration: none;
            }
        </style>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<p1>Update Conference</p1>
</div>
Id: <br>
<input type="text" name="id"  value="<?php echo $row['id']; ?>">
<br>
Title: <br>
<input type="text" name="title" class="txtField" value="<?php echo $row['title']; ?>">
<br>
Date:<br>
<input type="date" name="date" class="txtField" value="<?php echo $row['date']; ?>">
<br>
Latitude:<br>
<input type="text" name="latitude" class="txtField" value="<?php echo $row['latitude']; ?>">
<br>
Longitude:<br>
<input type="text" name="longitude" class="txtField" value="<?php echo $row['longitude']; ?>">
<br>
Country:<br>
<input type="text" name="country" class="txtField" value="<?php echo $row['country']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">
</form>
<td><button><a href="delete-process.php?id=<?php echo $row["id"]; ?>">Delete</a></button></td>
<button><a href="detail_conf.php">Back</a></button>
</body>
</html>


