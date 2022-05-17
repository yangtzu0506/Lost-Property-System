<!DOCTYPE html>
<?php session_start();
include "connect.php";
$searchtxt=$_GET["search"];
$labeltxt=$_GET["label"];
$account=$_SESSION["account"];
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>食在安心校園失物招領系統</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <header class="header bg-white">
        <div class="container px-lg-3">
          <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><h3 class="fw-bold text-uppercase text-dark">食在安心校園遺失物管理系統</h3></a>
            <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                <!-- 使用者權限 索引列-->
               <?php if($_SESSION["level"]=='0'){ ?>                       
                <li class="nav-item"><a class="nav-link" href="index.php">拾獲貼文</a></li>
                <li class="nav-item"><a class="nav-link" href="find.php">尋物啟示清單</a></li>
                <li class="nav-item"><a class="nav-link"  href="post.php">發布貼文</a></li>
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle active" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1 text-gray fw-normal"></i><?php echo $_SESSION["name"];?></a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link active" href="#">個人化</a><a class="dropdown-item border-0 transition-link" href="login/logout.php">登出</a></div>
                </li>
              </ul>

              <!-- 管理者權限 索引列-->
                <?php }else if($_SESSION["level"]=='1'){ ?>
                  <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="index.php">拾獲物管理</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">尋物啟示管理</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">貼文審核</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1 text-gray fw-normal"></i><?php echo $_SESSION["name"];?></a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="login/logout.php">登出</a></div>
                </li>
              </ul>
                <!-- 未登入 索引列-->
                <?php }else{?>
                  <li class="nav-item">
                  <!-- Link--><a class="nav-link active" href="index.php">拾獲貼文</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">尋物啟示清單</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link" id="pagesDropdown" href="post.php"  aria-haspopup="true" aria-expanded="false">發布貼文</a>
                </li>
              </ul>
              <ul class="navbar-nav ms-auto">               
                <li class="nav-item"><a class="nav-link" href="login/login.php"><i class="fas fa-user me-1 text-gray fw-normal"></i>登入</a></li>
              <?php }?>
              </ul>
            </div>
          </nav>
        </div>
      </header>
      
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">使用者</h1>
              </div>
              <div class="col-lg-4 text-lg-end">
                <nav aria-label="breadcrumb">
                  <!-- <ol class="breadcrumb justify-content-lg-end mb-0 px-0 bg-light">
                    <li class="breadcrumb-item"><a class="text-dark" href="index.html">遺失物系統</a></li>
                    <li class="breadcrumb-item active" aria-current="page">遺失物系統</li>
                  </ol> -->
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="container p-0">
            <div class="row">
              <!-- 用戶資料 -->
              <?php 
              $user_sql="select * from account where account_id='$account'";
              $user=mysqli_query($link,$user_sql);
              if($record=mysqli_fetch_assoc($user))
              {
                $name=$record["account_name"];
                $cellphone=$record["account_cellphone"];
                $password=$record["account_password"];
                $email=$record["account_email"];

              }
              ?>
               <!-- 用戶資料編輯資料彈窗 -->
               <div class="modal fade" id="useredit" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content overflow-hidden border-0">
                    <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body p-0">
                        <div class="col-lg-12" >
                          <div class="p-4 my-md-8">
                          <h1 class="h2 text-uppercase mb-0">編輯資料</h1>
                            <form method="post" action="edit_user.php?account_id=<?php echo $account?>">
                            <label class="h4 text-muted">帳號</label><input class="form-control form-control-lg" type="text" name="account_id" value=<?php echo $account?> readonly><br>
                            <label class="h5 text-muted">密碼</label><input class="form-control form-control-lg" type="text" name="account_password" value=<?php echo $password?>><br>
                            <label class="h5 text-muted">名稱</label><input class="form-control form-control-lg" type="text" name="account_name" value=<?php echo $name?>><br>
                           
                            <label class="h5 text-muted">聯絡電話</label><input class="form-control form-control-lg" type="text" name="account_cellphone" value=<?php echo $cellphone?>><br>
                            <label class="h5 text-muted">電子郵件</label><input class="form-control form-control-lg" type="text" name="account_email" value=<?php echo $email?>><br>

                          <input type="submit" class="btn btn-info" value="儲存">
                            </form>
                            </div>
                  
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-4 order-2 order-lg-1">
              <ul class='mb-0 list-inline'>
                <li class='list-inline-item m-0 p-0'><h2 class="list-inline-item text-uppercase mb-6" style="vertical-align:middle">個人資料</h2></li><li class='list-inline-item m-1 p-1'><a class='btn btn-sm btn-outline' style="width:50px;margin-left:200px;vertical-align:middle" href='#useredit' data-bs-toggle='modal' ><img src="img/edit.png" width='30px'></a></li>
              </ul>
                <div class="py-3 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold" style="font-size:20px">帳號</strong></div>
                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                  <li class="mb-2" style="font-size:20px"><?php echo $account?></li>
                </ul>

                <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold" style="font-size:20px">密碼</strong></div>
                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                  <li class="mb-2" style="font-size:20px"><?php echo $password?></li>
                </ul>

                <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold" style="font-size:20px">名稱</strong></div>
                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal">
                  <li class="mb-2" style="font-size:20px"><?php echo $name?></li>
                </ul>

                <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase fw-bold" style="font-size:20px">聯絡電話</strong></div>
                <ul class="list-unstyled small text-muted ps-lg-4 font-weight-normal mb-5">
                  <li class="mb-2" style="font-size:20px"><?php echo $cellphone?></li>
                </ul>
              </div>
              
              <!-- 個人刊登-->
              <div class="col-lg-8 order-1 order-lg-2 mb-5 mb-lg-0">
             
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-6 mb-2 mb-lg-0">
                  <h2 class="text-uppercase mb-6">個人刊登</h2>
                    <!--<p class="text-sm text-muted mb-0">Showing 1–12 of 53 results</p>-->
                  </div>
                </div>
                <!-- PRODUCT-->
                  <!--  Modal -->
                
                <?php
                // $link=mysqli_connect("localhost","root","12345678","sa");

                mysqli_select_db($link,"sa");
                
                if(isset($labeltxt)){
                $sql="select * from item where (item_label like '%$labeltxt%' or item_name like '%$labeltxt%') and item_id like '1%' and account_id='$account'";
               
                }
	              else if($searchtxt!="")
	              {
                
                $sql="select * from item where (item_name like '%$searchtxt%' or item_place like '%$searchtxt%' or item_text like '%$searchtxt%' or item_time like '%$searchtxt%') and item_id like '1%' and account_id='$account'";
        
		            }
	              else
	              {
              
                $sql="select * from item where item_id like '1%' and account_id='$account'";
		            }
                $all="select * from item";
                $all_rs=mysqli_query($link,$all);

                $rs=mysqli_query($link,$sql);
	              //$rs=mysql_query($sql,$link);

	              ?>
                <div class="row">
                  <!-- PRODUCT-->
                  <?php
                    while($record=mysqli_fetch_row($rs))
                    {
                      $id=$record[0];
                      $name=$record[1];
                      $text=$record[2];
                      $time=$record[3];
                      $place=$record[4];
                      $label=$record[5];
                      $img=$record[6];
                      $confirm = $record[7];
                      $account_id = $record[8];

                      ?>
      <!-- 詳細資料彈窗 -->
      <div class="modal fade" id="<?php echo $name?>" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(<?php echo $img?>)" href="<?php echo $img?>" data-gallery="gallery1" data-glightbox="<?php echo $name?>"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    
                    <h2 class="h4"><?php echo $name?></h2>
                    <p class="text-muted"><?php echo $text?></p>
                    <p class="text-mb mb-4">遺失時間：<?php echo $time?></p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                      <p class="text-mb mb-4">遺失地點：<?php echo $place?></p>
                      <p class="text-mb mb-4">標籤：<?php echo $label?></p>
                     
                      </div>
                      <a class="btn btn-sm btn-outline-dark" href="cart.html">認領</a> 
                    </div>
                  </div>
                  <p align=right class="text-muted" style="margin-right:30px">使用者名稱：<?php echo $account_id?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- 編輯資料彈窗 -->
      <script type="text/javascript">
            function label(e){
              
              var label=e;
            
            var sectors=new Array();
            sectors[0]=['請選擇標籤'];
            sectors[1]=['外套','上衣','褲子','襪子','鞋子'];
            sectors[2]=['帽子','眼鏡','手錶','項鍊','戒指','耳環','眼鏡'];
            sectors[3]=['學生證','身分證','駕照'];
            sectors[4]=['手機','耳機','電腦','平板','滑鼠','音響','相機'];
            sectors[5]=['肩包','腰包','手提包'];
            sectors[6]=['錢包','雨傘','香水','打火機'];
            sectors[7]=['鉛筆盒','文具'];
            var index;
            switch(label){
              case "衣物":
              index=1;
              break;
              case "配件":
              index=2;
              break;
              case "證件":
              index=3;
              break;
              case "3C產品":
              index=4;
              break;
              case "包包":
              index=5;
              break;
              case "隨身物品":
              index=6;
              break;
              case "文教用品":
              index=7;
              break;
              case "其他":
              index=8;
              break;
            }
    
           //換標籤內的選項
           var Sinner="";
            if(index==8){
            var otherselect=document.getElementById("other");
            Sinner=Sinner+"<input type='text' class='form-control form-control' name='item_label' placeholder='請輸入標籤類別'>";
            otherselect.innerHTML=Sinner;
            index=0;
            
            }else{
              var otherselect=document.getElementById("other");
              Sinner="<select class='show-tick form-control' id='labelSelect' name='item_label' data-customclass='form-control form-control-lg rounded-0' >";
              otherselect.innerHTML=Sinner;
              var Sinner="";

              for(var i=0;i<sectors[index].length;i++){
                Sinner=Sinner+'<option value='+sectors[index][i]+'>'+sectors[index][i]+'</option>';
                          }
            var sectorSelect=document.getElementById("labelSelect");
            sectorSelect.innerHTML=Sinner;
        
              }
            }
                  </script>
      <div class="modal fade" id="<?php echo $name?>edit" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(<?php echo $img?>)" href="<?php echo $img?>" data-gallery="gallery1" data-glightbox="<?php echo $name?>"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <form method="post" action="edit_post.php?item_id=<?php echo $id?>">
                    <label class="h4">名稱</label><input class="form-control" type="text" name="item_name" value=<?php echo $name?>>
                    <label class="text-muted">敘述</label><input class="form-control form-control-lg" type="text" name="item_text" value=<?php echo $text?>>
                    <label class="text-muted">遺失時間</label><input class="form-control" type="datetime-local" name="item_time" value=<?php echo $time?>>
                    <div class="row align-items-stretch mb-4 gx-0"> 
                    <label class="text-muted">遺失地點</label><input class="form-control" type="text" name="item_place" value=<?php echo $place?>>
                    <div class="col-lg-12 btn-group-toggle" id="labelName" >
                  <label class="form-label text-muted" for="">標籤 </label><br>
                  <input type="radio" class="btn-check" name="btnradio" id="衣物" autocomplete="off" value="衣物" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="衣物">衣物</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="配件" autocomplete="off" value="配件" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="配件">配件</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="證件" autocomplete="off" value="證件" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="證件">證件</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="3C產品" autocomplete="off" value="3C產品" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="3C產品">3C產品</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="包包" autocomplete="off" value="包包" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="包包">包包</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="隨身物品" autocomplete="off" value="隨身物品" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="隨身物品">隨身物品</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="文教用品" autocomplete="ff" value="文教用品" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="文教用品">文教用品</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="其他" autocomplete="ff" value="其他" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="其他">其他</label>&nbsp&nbsp
                </div>
                
                <div class="col-lg-12 form-group" id="other">
                    <select class="show-tick form-control" id="labelSelect" name="item_label" data-customclass="form-control form-control-lg rounded-0" >
                    <option disabled selected >請選擇標籤</option> 
                  </select>
                  </div>
                    </div>
                  <input type="submit" class="btn btn-info" value="儲存">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

                    <div class='col-lg-4 col-sm-6'>
                    <div class='product text-center'>
                      <div class='mb-3 position-relative'>
                        <div class='badge text-white bg-primary'><?php if($confirm==0){ echo "未認證"; } ?></div><a class='d-block' href='#'><img class='img-fluid w-100' src="<?php echo $img ?>" alt='...'></a>
                        <div class='product-overlay'>
                          <ul class='mb-0 list-inline'>
                            <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='cart.html'>認領</a></li>
                            <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href="#<?php echo $name?>" data-bs-toggle='modal'><i class='fas fa-expand'></i></a></li>
                            <?php  //若權限為1(管理者) 或 權限為0(使用者)且 刊登帳號=登入帳號 且 尚未通過認證 即可編輯
                            if($_SESSION["level"]=='1' || ($_SESSION["level"]=='0' && $_SESSION["account"]==$account_id && $confirm==0)){ ?>
                            <li class='list-inline-item m-0 p-0'><a class='btn btn-sm btn-outline-dark' href='#<?php echo $name?>edit' data-bs-toggle='modal'><i class='fas fa-edit'></i></a></li>
                          <?php }?>
                          </ul>
                        </div>
                      </div>
                      <h6> <a class='reset-anchor' href='detail.html'><?php echo $name?></a></h6>
                    </div>
                  </div>
                  <?php
                    }
                  ?>
                </div>
                <!-- PAGINATION-->
                <nav aria-label="Page navigation example">
                  <ul class="pagination justify-content-center justify-content-lg-end">
                    <li class="page-item mx-1"><a class="page-link" href="#!" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                    <li class="page-item mx-1 active"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item mx-1"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item mx-1"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item ms-1"><a class="page-link" href="#!" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </section>
      </div>
      <footer class="bg-dark text-white">
        <div class="container py-4">
          <div class="row py-5">
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Customer services</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Help &amp; Contact Us</a></li>
                <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
                <li><a class="footer-link" href="#!">Online Stores</a></li>
                <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
              </ul>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
              <h6 class="text-uppercase mb-3">Company</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">What We Do</a></li>
                <li><a class="footer-link" href="#!">Available Services</a></li>
                <li><a class="footer-link" href="#!">Latest Posts</a></li>
                <li><a class="footer-link" href="#!">FAQs</a></li>
              </ul>
            </div>
            <div class="col-md-4">
              <h6 class="text-uppercase mb-3">Social media</h6>
              <ul class="list-unstyled mb-0">
                <li><a class="footer-link" href="#!">Twitter</a></li>
                <li><a class="footer-link" href="#!">Instagram</a></li>
                <li><a class="footer-link" href="#!">Tumblr</a></li>
                <li><a class="footer-link" href="#!">Pinterest</a></li>
              </ul>
            </div>
          </div>
          <div class="border-top pt-4" style="border-color: #1d1d1d !important">
            <div class="row">
              <div class="col-md-6 text-center text-md-start">
                <p class="small text-muted mb-0">&copy; 2021 All rights reserved.</p>
              </div>
              <div class="col-md-6 text-center text-md-end">
                <p class="small text-muted mb-0">Template designed by <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Bootstrapious</a></p>
                <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- JavaScript files-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <!-- Nouislider Config-->
      <script>
        var range = document.getElementById('range');
        noUiSlider.create(range, {
            range: {
                'min': 0,
                'max': 2000
            },
            step: 5,
            start: [100, 1000],
            margin: 300,
            connect: true,
            direction: 'ltr',
            orientation: 'horizontal',
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
              to: function ( value ) {
                return '$' + value;
              },
              from: function ( value ) {
                return value.replace('', '');
              }
            }
        });
        
      </script>
      <script>
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
</html>