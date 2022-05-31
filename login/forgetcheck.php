<?php
session_start();
//檢查忘記密碼信箱帳號是否相同
include "../connect.php";
$account=$_POST["account"];
$email=$_POST["email"];
$_SESSION["account"]=$_POST["account"];
$_SESSION["email"]=$_POST["email"];

$sql="select * from account where account_id='$account' and account_email='$email'";
$rs=mysqli_query($link,$sql);

$nums=mysqli_num_rows($rs);
echo $nums;

if($nums == 0){?>
    <script>
    alert("此帳號或電子郵件不存在，請重新輸入"); 
    location.href="forget.php";
 </script>
    <?php    
}else{
echo $sql;
       header("location:newpassword.php");
    
    }
?>
