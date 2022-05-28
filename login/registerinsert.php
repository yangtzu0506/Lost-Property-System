<?php //註冊新增帳號
session_start();
include "../connect.php";

$account=$_SESSION["account"];
$password=$_SESSION["password"];
$name=$_SESSION["name"];
$phone=$_SESSION["phone"];
$email=$_SESSION["email"];
$validate=$_POST["validate"];
echo $validate;
echo $_SESSION["validate"];

if($validate==$_SESSION["validate"]){

    $sql="INSERT INTO account (account_id,account_password,account_name,account_level,account_cellphone,account_email) VALUES ('$account','$password','$name','0','$phone','$email')";
    if(mysqli_query($link,$sql)){       
        unset($_SESSION["account"]);
        unset($_SESSION["password"]);
        unset($_SESSION['name']);
        unset($_SESSION['phone']);
        unset($_SESSION['email']);
        unset($_SESSION['validate']);
        echo "<script>alert('註冊成功!');location.href='login.php';</script>";
    }else{
        echo $sql;
    }
}
else{
    echo "<script>alert('驗證碼錯誤，請重新輸入驗證碼!');location.href='emailcheck.php';</script>";
}
?>
