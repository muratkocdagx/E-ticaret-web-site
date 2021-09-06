<div class="header">
   <!--Header -->
   <div class="container">
      <div class="row">
         <div class="col-xs-6 col-md-4 main-logo">
            <a href="index.php"><img style="max-height: 100px;" src="<?php echo $settingscek['settings_logo']; ?>"  alt="logo" class="logo img-responsive"></a>
         </div>

         <div class="col-md-8">
            <div class="pushright">
               <div class="top">
                  <?php 
                  if (!isset($_SESSION['userskullanici_mail'])) { ?>

                     <a href="#" id="reg" class="btn btn-default btn-dark">Giriş<span> </span>Kayıt Ol</a>
                  <?php }  else {?>

                     <span class="btn btn-default btn-dark">Hoşgeldiniz<span> </span><?php echo $usercek['users_name']; ?></span>

                  <?php } ?>

                  <div class="regwrap">
                     <div class="row">
                        <div class="col-md-6 regform">
                           <div class="title-widget-bg">
                              <div class="title-widget">Login</div>
                           </div>
                           <form role="form" action="admin/process/process.php" method="POST">
                              <div class="form-group">
                                 <input type="text" class="form-control" name="users_mail" placeholder="Kullanıcı Adı">
                              </div>
                              <div class="form-group">
                                 <input type="password" class="form-control" name="users_password" placeholder="Şifre">
                              </div>
                              <div class="form-group">
                                 <button name="userslogin" class="btn btn-default btn-red btn-sm">Giriş Yap</button>
                              </div>
                           </form>
                        </div>
                        <div class="col-md-6">
                           <div class="title-widget-bg">
                              <div class="title-widget">Kayıt Ol</div>
                           </div>
                           <p>
                              Kayıtlı Değil misiniz? Buradan Kayıt Olunuz.
                           </p>
                           <a href="register" class="btn btn-default btn-yellow">Kayıt Ol</a>
                        </div>
                     </div>
                  </div>
                  <div class="srch-wrap">
                     <a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
                  </div>
                  <div class="srchwrap">
                     <div class="row">
                        <div class="col-md-12">
                           <form class="form-horizontal" role="form">
                              <div class="form-group">
                                 <label for="search" class="col-sm-2 control-label">Search</label>
                                 <div class="col-sm-10">
                                    <input type="text" class="form-control" id="search">
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="dashed"></div>
</div>
<!--Header -->
<div class="main-nav">
   <!--end main-nav -->
   <div class="navbar navbar-default navbar-static-top">
      <div class="container">
         <div class="row">
            <div class="col-md-10">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
               </div>
               <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                     <li>
                        <a href="index.php" class="active">Anasayfa</a>
                        <div class="curve"></div>
                     </li>
                     <?php 
                     $menusor=$db->prepare("SELECT * from menu where menu_status=:status order by menu_order ASC limit 5");

                     $menusor->execute(array(
                        'status' => 1
                     ));




                     while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) {


                        ?>
                        <li><a href="

                           <?php 

                           if(!empty($menucek['menu_url'])) {

                              echo $menucek['menu_url'];

                           }
                           else{
                              echo "sayfa-".seo($menucek['menu_name']);
                           }

                           ?>

                           "><?php echo $menucek['menu_name']; ?></a></li>

                           <?php
                        }
                        ?>
                     </ul>
                  </div>
               </div>
               <div class="col-md-2 machart">
                  <button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Alışveriş Sepeti</span>|<span class="allprice">$0.00</span></button>
                  <div class="popcart">
                     <table class="table table-condensed popcart-inner">
                        <tbody>

                           <?php 



                           $user_id=$usercek['users_id'];

                           $hampersor=$db->prepare("SELECT * from hamper where user_id=:user_id");

                           $hampersor->execute(array(

                              'user_id' => $user_id


                           ));

                           while ($hampercek=$hampersor->fetch(PDO::FETCH_ASSOC)) {

                              $product_id=$hampercek['product_id'];

                              $hproductsor=$db->prepare("SELECT * from products where product_id=:product_id");

                              $hproductsor->execute(array(

                                 'product_id' =>$product_id


                              ));
                              $hproductcek=$hproductsor->fetch(PDO::FETCH_ASSOC);


                                 $total_price+=$hproductcek['product_price']*$hampercek['product_adet'];

                                                         
                              ?>

                              <tr>
                                 <td>
                                    <a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
                                 </td>
                                 <td><a href="product.htm"><?php echo $hproductcek['product_name'] ?></td>
                                    <td><?php echo $hproductcek['product_id'] ?>X</td>
                                    <td><?php echo $hproductcek['product_price'] ?>₺</td>
                                    <td><a href="admin/process/process.php?hamper_id=<?php echo $hampercek['hamper_id']; ?>&hamperdelete=ok"><i class="fa fa-times-circle fa-2x"></i></a></td>
                                 </tr>

                              <?php } ?>
                           </tbody>
                        </table>
                        <br>
                        <div class="btn-popcart">
                           <a href="sepet" class="btn btn-default btn-red btn-sm">Sepeti Görüntüle</a>
                        </div>
                        <div class="popcart-tot">
                           <p>
                              Toplam Tutar<br>
                              <span> <?php  echo $total_price; ?>₺</span>
                           </p>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
<!--end main-nav -->