<?php
session_start();
//檢查註冊帳號是否重複
include "../connect.php";
$account=$_POST["account"];
$_SESSION["account"]=$_POST["account"];
$_SESSION["password"]=$_POST["password"];
$_SESSION["name"]=$_POST["name"];
$_SESSION["phone"]=$_POST["phone"];
$_SESSION["email"]=$_POST["email"];
$sql="select * from account where account_id='$account'";
$rs=mysqli_query($link,$sql);

$nums=mysqli_num_rows($rs);
echo $nums;

if($nums == 1){?>
    <script>
    alert("帳號已存在！請重新輸入"); 
    location.href="register.php";
 </script>
    <?php    
}else{
echo $sql;
    
      header("location:validate.php");
    
    }
?>
