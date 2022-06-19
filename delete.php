<?php
//функція видалення даних із бази
include_once 'database.php';
require_once("database.php");
require_once("conference.php");
$sql = "DELETE FROM conference WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($link, $sql)) {
    header("Location:detail_conf.php");
} else {
    echo "Error deleting record: " . mysqli_error($link);
}
mysqli_close($link);
?>