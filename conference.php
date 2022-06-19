<?php
//витягування даних з бази даних для подальшої обробки
require_once("database.php");
require_once("conferences.php");

$link = db_connect();
$conferences = conferences_all($link);
?>