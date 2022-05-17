<?php
//刪除更改資料庫
include "../connect.php";
$id = $_GET["id"];
// $link=mysqli_connect("localhost","root","12345678","sa");
$delete = "delete from item where item_id=$id";
if(mysqli_query($link,$delete)){
header("location:../confirm.php");
}
?>