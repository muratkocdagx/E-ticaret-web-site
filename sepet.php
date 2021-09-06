<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'inc/head.php';?>

</head>
<body>
   <div id="wrapper">
    <?php include 'inc/header.php'; ?>


    <div class="container">

      <div class="title-bg">
         <div class="title">Sepet</div>
      </div>
      
      <div class="table-responsive">
         <table class="table table-bordered chart">
            <thead>
               <tr>
                  <th>Seçenek</th>
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
                  <tr>
                     <td style="vertical-align:inherit;"><a href="admin/process/process.php?hamper_id=<?php echo $hampercek['hamper_id']; ?>&hamperdelete=ok"><i class="fa fa-times-circle fa-2x"></i></a></td>
                     <td  style="vertical-align:inherit;"><img src="images\demo-img.jpg" width="100" alt=""></td>
                     <td  style="vertical-align:inherit;"><?php echo $productcek['product_name'] ?></td>
                     <td  style="vertical-align:inherit;"><?php echo $productcek['product_id'] ?></td>
                     <td  style="vertical-align:inherit;"><form><input type="text" class="form-control quantity" value="<?php echo $hampercek['product_adet'] ?>"></form></td>
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
            <div class="total">Toplam Fiyat : <span class="bigprice"><?php echo $total_price;?>₺</span></div>
         <div class="clearfix"></div>
         <a href="odeme" class="btn btn-default btn-yellow">Ödeme Sayfası</a>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<div class="spacer"></div>



<div class="spacer"></div>
</div>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/script.php'; ?>

</div>
</body>
</html>