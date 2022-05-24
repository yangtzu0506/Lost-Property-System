<?php
session_start();

include "connect.php";



$account_id=$_GET["account_id"];
$post_type = $_POST["post_type"];
$item_name = $_POST["item_name"];
$item_text = $_POST["item_text"];
$item_time = $_POST["item_time"];
$item_place = $_POST["item_place"];
$item_label = $_POST["item_label"];

if($_SESSION['level']==1){ //若管理者刊登則設為已認證
    $item_confirm = 1;
}else{
    $item_confirm = 0;
}

if($post_type=="尋物啟事"){ //尋物開頭為2,拾獲開頭為1
    $max_id="select max(item_id) from item where item_id like '2%' ";
}else{
    $max_id="select max(item_id) from item where item_id like '1%' ";
}
$id=mysqli_query($link,$max_id);
$item_list=mysqli_fetch_row($id);
$item_id=$item_list[0]+1;
//找出最大id+1作為下一個id
echo "123";
//上傳圖片
$type=$_FILES["item_img"]["type"];
$name=$_FILES["item_img"]["name"];

if($_FILES['item_img']['error'] === UPLOAD_ERR_OK){
//This gets all the other information from the form
    $file = $_FILES['item_img']['tmp_name'];
    $dest = 'img/' . $_FILES['item_img']['name'];
    
    # 將檔案移至指定位置
    move_uploaded_file($_FILES["item_img"]["tmp_name"],'img/'.$_FILES["item_img"]["name"]);
    $sql="INSERT INTO item (item_id,item_name,item_text,item_time,item_place,item_label,item_img,item_confirm,account_id) VALUES ($item_id,'$item_name','$item_text','$item_time','$item_place','$item_label','$dest',$item_confirm,$account_id)";
    if(mysqli_query($link,$sql)){ ?>
    <script>  
        alert("上傳成功!");
        location.href="index.php";
    </script>
   <?php }
    else{?>
        <script>
        alert("刊登失敗，請檢查內容!");
        location.href("post.php");
        </script>
    <?php }

}else if($_FILES['item_img']['error'] === UPLOAD_ERR_NO_FILE){
    $sql="INSERT INTO item (item_id,item_name,item_text,item_time,item_place,item_label,item_img,item_confirm,account_id) VALUES ($item_id,'$item_name','$item_text','$item_time','$item_place','$item_label','img/no_img.jpg',$item_confirm,$account_id)";
    if(mysqli_query($link,$sql)){ ?>
    <script>
        alert("上傳成功!");
        location.href="index.php";
    </script>
   <?php }
}else{   ?>
    <script>
    alert("上傳失敗，請檢查檔案格式!");
    location.href("post.php");
    </script>
<?php }

// if($method=="add")
// {
  
//     $sql="insert into item (item_id,item_name,item_describe,item_time,item_place,item_label,item_img,item_confirm) values ('$name','$phone','$room','$check_in','$check_out','$ps')";
//     // $sql1="insert into reservation (name,phone,room,check_in,check_out,ps) values ('$name','$phone','$room','$check_in','$check_out','$ps')";
//     if(mysqli_query($link,$sql))
//     {
//         header('location:../my_reserve.php');
//     }
//     else{
//     echo "新增錯誤";
//     echo $sql;
//     }
// }
// elseif($method=="edit"){

//     $sql="update reservation set room = '$room',name='$name',phone='$phone',check_in='$check_in',check_out='$check_out',ps='$ps' where id=$id";
//     echo $sql;
//     if(mysqli_query($link,$sql))
//     {
//         header('location:../reservation.php');
//     } 
//     else{
//         echo "編輯錯誤";
//         }
//}
?>