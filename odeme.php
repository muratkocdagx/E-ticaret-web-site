<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'inc/head.php';
   $bankasor=$db->prepare("SELECT * from banka order by banka_id ASC");

   $bankasor->execute();

   ?>
</head>
<body>
   <div id="wrapper">
      <?php include 'inc/header.php'; ?>
      <div class="container">
         <div class="title-bg">
            <div class="title">Sepet</div>
         </div>
         <form action="admin/process/process.php" method="POST">

            <div class="table-responsive">
               <table class="table table-bordered chart">
                  <thead>
                     <tr>
                        <th>Ürün Resmi</th>
                        <th>Ürün İsmi</th>
                        <th>Ürün Kodu</th>
                        <th>Adet</th>
                        <th>Total Fiyat</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $user_id=$usercek['users_id'];

                     $hampersor=$db->prepare("SELECT * from hamper where user_id=:user_id");

                     $hampersor->execute(array(

                        'user_id' => $user_id


                     ));

                     while ($hampercek=$hampersor->fetch(PDO::FETCH_ASSOC)) {

                        $product_id=$hampercek['product_id'];

                        $productsor=$db->prepare("SELECT * from products where product_id=:product_id");

                        $productsor->execute(array(

                           'product_id' =>$product_id


                        ));
                        $productcek=$productsor->fetch(PDO::FETCH_ASSOC);








                        ?>
                        <!--<input type="hidden" name="product_idh[]" value="<?php echo $productcek['product_id'] ?>">-->
                        <tr>
                           <td  style="vertical-align:inherit;"><img src="images\demo-img.jpg" width="100" alt=""></td>
                           <td  style="vertical-align:inherit;"><?php echo $productcek['product_name'] ?></td>
                           <td  style="vertical-align:inherit;"><?php echo $productcek['product_id'] ?></td>
                           <td  style="vertical-align:inherit;"><?php echo $hampercek['product_adet'] ?></td>
                           <td  style="vertical-align:inherit;"><?php echo $productcek['product_price'] ?>₺</td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <!--
                     <form class="form-horizontal coupon" role="form">
                        <div class="form-group">
                           <label for="coupon" class="col-sm-3 control-label">Coupon Code</label>
                           <div class="col-sm-7">
                              <input type="email" class="form-control" id="coupon" placeholder="Email">
                           </div>
                           <div class="col-sm-2">
                              <button class="btn btn-default btn-red btn-sm">Apply</button>
                           </div>
                        </div>
                     </form>
                     
                     
                     
                     
                     <form class="form-horizontal coupon" role="form">
                        <div class="form-group">
                           <label for="coupon2" class="col-sm-3 control-label">Coupon Code</label>
                           <div class="col-sm-7">
                              <input type="email" class="form-control " id="coupon2" placeholder="Email">
                           </div>
                           <div class="col-sm-2">
                              <button class="btn btn-default btn-red btn-sm">Apply</button>
                           </div>
                        </div>
                     </form>
                  -->
               </div>
               <div class="col-md-3 col-md-offset-3">
                  <div class="subtotal-wrap">
                     <div class="total">Toplam Fiyat : <span class="bigprice"><?php  echo $total_price; ?>₺</span></div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
               </div>
            </div>
            <div class="tab-review">
               <ul id="myTab" class="nav nav-tabs shop-tab">
                  <li class="active"><a href="#kvk" data-toggle="tab">Kredi Kartı</a></li>
                  <li class=""><a href="#eft" data-toggle="tab">Banka Havalesi</a></li>
               </ul>
               <div id="myTabContent" class="tab-content shop-tab-ct">
                  <div class="tab-pane fade active in" id="kvk">
                     KVK 
                  </div>
                  <div class="tab-pane fade" id="eft">
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                     </p>
                     <?php 
                     while ($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) {

                       ?>
                       <input type="radio" name="banka_id" style="box-shadow: 0px 0px 0px;" value="<?php echo $bankacek['banka_name']; ?>">  <?php echo $bankacek['banka_name']; ?>
                       <br>
                       <br>
                    <?php } ?>

                    <input type="hidden" name="user_id" value="<?php echo $usercek['users_id']; ?>">
                    <input type="hidden" name="siparis_toplam" value="<?php echo $total_price; ?>">
                    <button class="btn btn-syccess mt-2" type="submit" name="ordersaveeft">Sipariş Ver</button>
                 </div>
              </div>
           </div>
           <div class="spacer"></div>
           <div class="spacer"></div>
        </form>

     </div>
     <?php include 'inc/footer.php'; ?>
     <?php include 'inc/script.php'; ?>
  </div>
</body>
</html>