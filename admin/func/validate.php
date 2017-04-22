<?php
$u = $_POST["username"];
$p = $_POST["password"];
include_once("tosql.php");
$valid = new validate($u,$p);
?>