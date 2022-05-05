<?php
session_start();

$account=$_POST["account"];
$password=$_POST["password"];
$link=mysqli_connect("localhost","root","12345678","sa");
$sql="select * from account where account_id='$account' and account_password='$password'";
$rs=mysqli_query($link,$sql);

if ($record=mysqli_fetch_assoc($rs))
    {
        $_SESSION['level']=$record['account_level'];
        $_SESSION['name']=$record['account_name'];
        header('location:../index.php');
    }
else{
    ?>
    <script>
       alert("請確認帳號密碼"); 
       location.href="login.php";
    </script>
    <?php
    }
?>
