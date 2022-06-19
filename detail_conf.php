<?php
//відображення сторінки деталей конференції
require_once("database.php");
require_once("conference.php");
$result = mysqli_query($link ,"SELECT * FROM conference");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf8">
        <title>Detail Conference</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <button><a href="list_conf.php">List Conference</a></button>
        <button><a href="detail_conf.php">Details Conference</a></button>
    <style>
            a{
                color: black;
                text-decoration: none;
                border: solid;
            }
        </style>
        <h1>Detail Conference</h1>
        <div class = "container">
            

            <?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
      <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) {
      ?>
    <tr>
    <td><b>Title</b></td>
    <td><?php echo $row["title"]; ?></td>
    <td><b>Date</b></td>
    <td><?php echo $row["date"]; ?></td>
    <?php if($row["latitude"] AND $row["longitude"] > 0){
    ?><td><b>Latitude</b></td>
        <td><?php echo $row["latitude"]; ?></td>
        <td><b>Longitude</b></td>
        <td><?php echo $row["longitude"]; ?></td>
        <td><b>Map</b></td>
        <td><iframe class = "iframe"src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d1426533.0186343887!2d35.17881697578127!3d45.70707854621885!3m2!1i1024!2i768!4f13.1!5e0!3m2!1suk!2sua!4v1655557793147!5m2!1suk!2sua" width="60" height="40" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td>
    <?php 
        }
        else {
            $a = 1;
        }
    ?>
    <?php if($row["country"]> 0){
    ?>
    <td><b>Country</b></td>
        <td><?php echo $row["country"]; ?></td>
        <?php 
        }
        else {
            return "No country";
        }
    ?>
        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
        <td><a href="update.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
      <?php
      $i++;
      }
      ?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
        </div>
    </body>
</html>