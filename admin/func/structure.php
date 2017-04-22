<?php
include_once("tosql.php");
$a = new validate("seacc8","67982154");

/*$a = "67982154";
$b = "seacc8";
$db = new mysqli("localhost","savearticle","savearticle123");
if(mysqli_connect_errno()){
    echo "保存失败";
    exit;
}
$db->select_db("article");
$query = "select username from username where username='".$b."'";
$result = $db->query($query);
$num_rows = $result->num_rows;
if($num_rows<1){
    echo "该账户不存在";
    $result->free();
}else{
    $query = "select password from username where username='".$b."'";
    $result = $db->query($query);
    if($result->fetch_assoc()["password"] == $a){
        echo "密码正确";
    }else{
        echo "密码错误";
    }
}*/


?>