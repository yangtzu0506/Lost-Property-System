<?php
include "connect.php";
$item_id = $_GET["item_id"];
$item_name = $_POST["item_name"];
$item_text = $_POST["item_text"];
$item_time = $_POST["item_time"];
$item_place = $_POST["item_place"];
$item_label = $_POST["item_label"];

//上傳圖片
$sql="update item set item_name = '$item_name',item_text='$item_text',item_time='$item_time',item_place='$item_place',item_label='$item_label' where item_id=$item_id";
    echo $sql;
    if(mysqli_query($link,$sql))
    {
        header('location:index.php');
    } 
    else{?>
    <script> 
    alert("編輯錯誤，請檢查資料");
    location.href="index.php";

    </script>
<?php
        }
?>