<!DOCTYPE html>
<?php session_start();
$account_id=$_SESSION['account'];

if(!isset($_SESSION["level"])){ 
  
  ?>
  <script>
    alert("請先登入才可以發布貼文！");
    location.href="login/login.php";
  </script>
  <?php
}
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
                <li class="nav-item"><a class="nav-link active"  href="post.php">發布貼文</a></li>
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1 text-gray fw-normal"></i><?php echo $_SESSION["name"];?></a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="#">個人刊登</a><a class="dropdown-item border-0 transition-link" href="login/logout.php">登出</a></div>
                </li>
              </ul>

              <!-- 管理者權限 索引列-->
                <?php }else if($_SESSION["level"]=='1'){ ?>
                  <li class="nav-item">
                  <!-- Link--><a class="nav-link" href="index.php">拾獲物管理</a>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">尋物啟示管理</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">貼文審核</a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="index.html">Homepage</a><a class="dropdown-item border-0 transition-link" href="shop.html">Category</a><a class="dropdown-item border-0 transition-link" href="detail.html">Product detail</a><a class="dropdown-item border-0 transition-link" href="cart.html">Shopping cart</a><a class="dropdown-item border-0 transition-link" href="checkout.html">Checkout</a></div>
                </li>
                <li class="nav-item"><a class="nav-link active"  href="post.php">發布貼文</a></li>
              </ul>
              <ul class="navbar-nav ms-auto">               
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user me-1 text-gray fw-normal"></i><?php echo $_SESSION["name"];?></a>
                  <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a class="dropdown-item border-0 transition-link" href="login/logout.php">登出</a></div>
                </li>
              </ul>
                
              <?php }?>
            </div>
          </nav>
        </div>
      </header>
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content overflow-hidden border-0">
            <button class="btn-close p-4 position-absolute top-0 end-0 z-index-20 shadow-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="glightbox product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-1.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a><a class="glightbox d-none" href="img/product-5-alt-2.jpg" data-gallery="gallery1" data-glightbox="Red digital smartwatch"></a></div>
                <div class="col-lg-6">
                  <div class="p-4 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 1"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 2"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 3"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0 4"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">Red digital smartwatch</h2>
                    <p class="text-muted">$250</p>
                    <p class="text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4 gx-0">
                      <div class="col-sm-7">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5"><a class="btn btn-dark btn-sm w-100 h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark text-decoration-none p-0" href="#!"><i class="far fa-heart me-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">發布貼文</h1>
              </div>
              <div class="col-lg-6 text-lg-end">
                <nav aria-label="breadcrumb">
                  
                </nav>
              </div>
            </div>
          </div>
        </section>
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
              Sinner="<select class='show-tick form-control' id='selectLabel' name='item_label' data-customclass='form-control form-control-lg rounded-0' >";
              otherselect.innerHTML=Sinner;
              var Sinner="";

              for(var i=0;i<sectors[index].length;i++){
                Sinner=Sinner+'<option value='+sectors[index][i]+'>'+sectors[index][i]+'</option>';
                          }
            var sectorSelect=document.getElementById("selectLabel");
            sectorSelect.innerHTML=Sinner;

              }
            }
            function postType(e){
              type=e;
              sinner="";
              if(type=="尋物啟事"){
                var type=document.getElementById("type");
                sinner+="<h2 class='h5 text-uppercase mb-4'>發布尋物啟事</h2>";
                type.innerHTML=sinner;
        
              }else{
                var type=document.getElementById("type");
                sinner+="<h2 class='h5 text-uppercase mb-4'>發布拾獲貼文</h2>";
                type.innerHTML=sinner;
              }
            }
                  </script>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <div id="type"><h2 class="h5 text-uppercase mb-4">發布尋物啟事</h2></div>
          <div class="row">
            <div class="col-lg-12">
              
              <!-- 發布貼文表單開始 -->
              <form action="add_post.php?account_id=<?php echo $account_id?>" method="post" enctype="multipart/form-data"> 
                <div class="row gy-3">
                <div class="col-lg-12 form-group">
                    <label class="form-label text-sm text-uppercase" for="">發布貼文類型</label>
                    <select class="selectpicker show-tick form-control" name="post_type" data-customclass="form-control form-control-lg rounded-0" value="貼文類型" onchange="postType(this.value)">
                      <option disabled selected >貼文類型</option>
                      <option value="尋物啟事">尋物啟事</option>
                      <option value="拾獲貼文">拾獲貼文</option>
                    </select>
                  </div>

                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="name">物品名稱</label>
                    <input class="form-control form-control-lg" type="text" id="name" name="item_name" placeholder="請輸入物品名稱">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="place">遺失地點</label>
                    <input class="form-control form-control-lg" type="text" id="place" name="item_place" placeholder="請輸入遺失地點">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="time">遺失時間 </label>
                    <input class="form-control form-control-lg" type="datetime-local" id="time" name="item_time" placeholder="請輸入遺失時間">
                  </div>
                  <div class="col-lg-6">
                    <label class="form-label text-sm text-uppercase" for="phone">請上傳圖片 </label>
                    <input class="form-control form-control-lg" type="file" id="profile_pic" name="item_img" accept=".jpg, .jpeg, .png"><br>
                  </div>
                  <div class="col-lg-12 btn-group-toggle" id="labelName" >
                  <label class="form-label text-sm text-uppercase" for="">標籤</label><br>
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
                  <input type="radio" class="btn-check" name="btnradio" id="文教用品" autocomplete="off" value="文教用品" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="文教用品">文教用品</label>&nbsp&nbsp
                  <input type="radio" class="btn-check" name="btnradio" id="其他" autocomplete="off" value="其他" onchange="label(this.value)">
                  <label class="btn btn-outline-info" for="其他">其他</label>&nbsp&nbsp
                </div>
                <div class="col-lg-12 form-group" id="other">
                    <select class="show-tick form-control" id="selectLabel" name="item_label" data-customclass="form-control form-control-lg rounded-0" >
                    <option disabled>請選擇標籤</option> 
                  </select>
                  </div>
                  <div class="col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="describe">物品敘述</label>
                    <textarea class="form-control form-control-lg" type="text" id="describe" name="item_describe" placeholder="請輸入物品敘述"></textarea>
                    
                  </div>
         
                  <div class="col-lg-6">
                    <button class="btn btn-link text-dark p-0 shadow-0" type="button" data-bs-toggle="collapse" data-bs-target="#alternateAddress">
                      <div class="form-check">
                        <input class="form-check-input" id="alternateAddressCheckbox" type="checkbox">
                        <label class="form-check-label" for="alternateAddressCheckbox">Alternate billing address</label>
                      </div>
                    </button>
                  </div>
                  <div><form id="myform" method="" action="" enctype="multipart/form-data">
                    
                    </form></div>
                  <div class="collapse" id="alternateAddress">
                    <div class="row gy-3">
                      <div class="col-12 mt-4">
                        <h2 class="h4 text-uppercase mb-4">Alternative billing details</h2>
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="firstName2">First name </label>
                        <input class="form-control form-control-lg" type="text" id="firstName2" placeholder="Enter your first name">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="lastName2">Last name </label>
                        <input class="form-control form-control-lg" type="text" id="lastName2" placeholder="Enter your last name">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="email2">Email address </label>
                        <input class="form-control form-control-lg" type="email" id="email2" placeholder="e.g. Jason@example.com">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="phone2">Phone number </label>
                        <input class="form-control form-control-lg" type="tel" id="phone2" placeholder="e.g. +02 245354745">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="company2">Company name (optional) </label>
                        <input class="form-control form-control-lg" type="text" id="company2" placeholder="Your company name">
                      </div>
                      <div class="col-lg-6 form-group">
                        <label class="form-label text-sm text-uppercase" for="countryAlt">Country</label>
                        <select class="country" id="countryAlt" data-customclass="form-control form-control-lg rounded-0">
                          <option value>Choose your country</option>
                        </select>
                      </div>
                      <div class="col-lg-12">
                        <label class="form-label text-sm text-uppercase" for="address2">Address line 1 </label>
                        <input class="form-control form-control-lg" type="text" id="address2" placeholder="House number and street name">
                      </div>
                      <div class="col-lg-12">
                        <label class="form-label text-sm text-uppercase" for="addressalt2">Address line 2 </label>
                        <input class="form-control form-control-lg" type="text" id="addressalt2" placeholder="Apartment, Suite, Unit, etc (optional)">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="city2">Town/City </label>
                        <input class="form-control form-control-lg" type="text" id="city2">
                      </div>
                      <div class="col-lg-6">
                        <label class="form-label text-sm text-uppercase" for="state2">State/County </label>
                        <input class="form-control form-control-lg" type="text" id="state2">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 form-group">
                    <button class="btn btn-dark" type="submit">送出</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- ORDER SUMMARY-->
           
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