<?php
//認證更改資料庫
include "../connect.php";
$id = $_GET["id"];
// $link=mysqli_connect("localhost","root","12345678","sa");
$confirm = "update item set item_confirm = 1 where item_id=$id";
if(mysqli_query($link,$confirm)){
header("location:../confirm.php");
}
?>