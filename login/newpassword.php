<?php
include "connect.php";
session_start();
//產生、發送暫時密碼
$chars="1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$var_size=strlen($chars);
for( $x = 0; $x < 8; $x++ ) {  
    $new_password= $new_password.$chars[ rand( 0, $var_size - 1 )];  
    
}

    $_SESSION["new_password"]=$new_password;
    $name=$_SESSION["name"];
    $email=$_SESSION["email"];
    $subject="拾在安心校園遺失物管理系統通知信";
    $body=$name."您好:<br/>系統已將您的密碼重新設置，請您使用此密碼重新進行登入，並至個人化更改您的密碼，密碼如下：<br><strong><h1 style='color:blue'>".$new_password."<br></h1>";
    print_r($_SESSION);
    header("location:../sendEmail.php?name=$name&email=$email&subject=$subject&body=$body&method=forget");

?>