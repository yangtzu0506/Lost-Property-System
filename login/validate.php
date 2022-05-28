<?php
include "connect.php";
session_start();
//產生、發送驗證碼
$limit = 5;
$validate=random_int(10 ** ($limit - 1), (10 ** $limit) - 1);
$_SESSION["validate"]=$validate;
    $name=$_SESSION["name"];
    $email=$_SESSION["email"];
    $subject="拾在安心校園遺失物管理系統通知信";
    $body=$name."您好:<br/>您的拾在安心遺失物管理系統註冊驗證碼為<br><strong><h1 style='color:blue'>".$validate."<br></h1>請回到註冊網頁輸入驗證碼進行帳號驗證";

    header("location:../sendEmail.php?name=$name&email=$email&subject=$subject&body=$body&method=validate");

?>