<?php
//вивід листа конференцій
require_once("database.php");
require_once("conference.php");
$result = mysqli_query($link ,"SELECT * FROM conference");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf8">
        <title>eeeee</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <button><a href="list_conf.php">List Conference</a></button>
        <button><a href="detail_conf.php">Detail Conference</a></button>
    <style>
            a{
                color: black;
                text-decoration: none;
                border: solid;
            }
        </style>
        <h1>List Conference</h1>
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
        <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
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
<a href="create.php">Create conference</a>
        </div>
    </body>
</html>