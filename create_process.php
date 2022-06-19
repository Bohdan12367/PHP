<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf8">
        <title>eeeee</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class = "container">
            <button><a href="detail_conf.php">Detail conference</button>
<?php
//відсилання ново створених даних та їх миттєве опрацювання
require_once("database.php");
require_once("conferences.php");
 $link = db_connect();

if(isset($_GET['action']))
    $action = $_GET['action'];
else 
    $action = "";
if($action == "add"){
    if(!empty($_POST)){
        conferences_create($link, $_POST['title'],$_POST['date'],$_POST['latitude'],$_POST['longitude'],$_POST['country']);
        header("Location:detail_conf.php");
    }
    include("create.php");
}

else{ 
    $conferences = conferences_all($link);
    include("../phpproject/detail_conf.php");
 }

?>

       </div>       
    </body>
</html>

