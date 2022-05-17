<?php
include "connect.php";
$account_id = $_GET["account_id"];
$account_password = $_POST["account_password"];
$account_name = $_POST["account_name"];
$account_cellphone = $_POST["account_cellphone"];
$account_email = $_POST["account_email"];


//上傳圖片
$sql="update account set account_password = '$account_password',account_name='$account_name',account_cellphone='$account_cellphone',account_email='$account_email' where account_id=$account_id";
    echo $sql;
    if(mysqli_query($link,$sql))
    {?>
        <script> 
        alert("編輯成功!");
        location.href="user.php";
    
        </script>
      <?php 
    } 
    else{?>
    <script> 
    alert("編輯錯誤，請檢查資料");
    location.href="user.php";

    </script>
<?php
        }
?>