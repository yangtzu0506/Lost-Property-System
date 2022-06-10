<?php session_start();
include "connect.php";
$searchtxt=$_GET["search"];
$labeltxt=$_GET["label"];

//超過一週未認證下架
date_default_timezone_set('Asia/Taipei'); //設定時區
$today = strtotime(date("Y-m-d H:i:s"));

echo $month;



?>
<?php
                    while($record=mysqli_fetch_row($rs))
                    {
                      
                      $time=$record[3];
                      $confirm = $record[7];
                      //算時間
                      $secondDay=strtotime($time);
                      $month=($today-$secondDay)/3600/24/30;
                      $day=($today-$secondDay)/3600/24;

                      if($day>7 && $confirm==0){
                        $sql_day="delete from item where item_id=$id";
                        mysqli_query($link,$sql_day);
                      }
                      else if($month>3){
                        $sql_day="delete from item where item_id=$id";
                        mysqli_query($link,$sql_day);
                      }else if($month >1 && $confirm==1){
                        $sql_day="update item set item_confirm = 2 where item_id=$id";
                        mysqli_query($link,$sql_day);
                      }
                    }?>
                      
