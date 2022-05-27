<?php //註冊新增帳號
session_start();
include "../connect.php";

$account=$_GET["account"];
$password=$_GET["password"];
$name=$_GET["name"];
$phone=$_GET["phone"];
$email=$_GET["email"];
$validate=$_POST["validate"];

if($validate==$_SESSION["validatet"]){

    $sql="INSERT INTO account (account_id,account_password,account_name,account_level,account_cellphone,account_email) VALUES ('$account','$password','$name','1','$phone','$email')";
    if(mysqli_query($link,$sql)){ 
        echo "<script>alert('註冊成功!');location.href='login.php';</script>";
    }else{
        echo $sql;
    }
}
else{
    echo "<script>alert('驗證碼錯誤，請重新輸入驗證碼!');location.href='emailcheck.php';</script>";
}
?>
