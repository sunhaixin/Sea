<?php
date_default_timezone_set("PRC");
include_once("tosql.php");
$a = new Insert();
$a->title = $_POST["title"];
$a->year = $_POST["set-year"]?$_POST["set-year"]:date("Y");
$a->month = $_POST["set-month"]?$_POST["set-month"]:date("m");
$a->date = $_POST["set-date"]?$_POST["set-date"]:date("d");
$a->hour = $_POST["set-hour"]?$_POST["set-hour"]:date("H");
$a->min = $_POST["set-min"]?$_POST["set-min"]:date("i");
$a->sec = $_POST["set-sec"]?$_POST["set-sec"]:date("s");
$a->category = $_POST["set-category"]?$_POST["set-category"]:"js";
$a->artId = $a->year.$a->month.$a->date.$a->hour.$a->min.$a->sec.rand(0,9);
$a->time = $a->year."-".$a->month."-".$a->date." ".$a->hour.":".$a->min.":".$a->sec;
$a->entry = $_POST["entry"];
$a->toInsert();
?>