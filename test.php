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
             </script>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <div id="type"><h2 class="h5 text-uppercase mb-4">發布尋物啟事</h2></div>
          <div class="row">
            <div class="col-lg-12">
              
              <!-- 發布貼文表單開始 -->
              <form action="add_post.php?account_id=<?php echo $account_id?>" method="post" enctype="multipart/form-data"> 
               
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