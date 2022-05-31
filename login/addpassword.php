<?php
include "../connect.php";
session_start();
$password = $_SESSION['new_password'];
$account_id = $_SESSION['account'];

$sql="update account set account_password='$password' where account_id='$account_id'";
    echo $sql;
    if(mysqli_query($link,$sql))
    {
        unset($_SESSION['new_password']);
        unset($_SESSION['account']);
        header('location:login.php');
    } else{?>
        <script> 
        alert("編輯錯誤，請檢查資料");
        </script>
    <?php
            }

?> 