<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'inc/head.php'; ?>

</head>
<body>
   <div id="wrapper">
    <?php include 'inc/header.php'; ?>


    <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="page-title-wrap">
               <div class="page-title-inner">
                  <div class="row">
                     <div class="col-md-4">
                        <div class="bigtitle">Sipariş <small> Detaylarınız </small></div>
                        <div class="">Verilen Sipariş Detayı</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="title-bg">
         <div class="title">Sipariş Detay Bilgileri</div>
      </div>
      
      <div class="table-responsive">
         <table class="table table-bordered chart">
            <thead>
               <tr>
                  <th>Sipariş No</th>
                  <th>Tarih</th>
                  <th>Ürün Adı</th>
                  <th>Tutar</th>
                  <th>Adet</th>
                  <th>Ödeme Yöntemi</th>
                  <th>Durum</th>
               </tr>
            </thead>
            <tbody>
               <?php 



               $siparisdetaysor=$db->prepare("SELECT * from siparis_detay where siparis_id=:siparis_id");

               $siparisdetaysor->execute(array(

                  'siparis_id' => $_GET['siparis_id']


               ));
               

               while ($siparisdetaycek=$siparisdetaysor->fetch(PDO::FETCH_ASSOC)) {

                  $siparis_id =$siparisdetaycek['siparis_id'];

                  $user_id=$usercek['users_id'];

                  $siparissor=$db->prepare("SELECT * from siparis where user_id=:user_id");

                  $siparissor->execute(array(

                     'user_id' => $user_id


                  ));

                  $sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);

                  $urun_id=$siparisdetaycek['product_id'];
                  $urunsor=$db->prepare("SELECT * from products where product_id=:id");

                  $urunsor->execute(array(

                     'id' => $urun_id


                  ));

                  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

                  ?>
                  <tr>
                     <td><?php echo $siparisdetaycek['siparis_id'] ?></td>
                     <td><?php echo $sipariscek['siparis_time'] ?></td>
                     <td><?php echo $uruncek['product_name'] ?></td>
                     <td><?php echo $siparisdetaycek['product_price'] ?></td>
                     <td><?php echo $siparisdetaycek['product_adet'] ?></td>
                     <td><?php echo $sipariscek['siparis_tip'] ?></td>
                     <td>

                        <?php 

                        $siparis_durumu=$sipariscek['siparis_odeme'];

                        if ($siparis_durumu==0) { echo "Ödeme Bekleniyor.";} 

                        elseif($siparis_durumu==1){echo "Ödeme Tamamlandı.";}
                        ?>

                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>

      <div class="spacer"></div>
   </div>


   <?php include 'inc/footer.php'; ?>
   <?php include 'inc/script.php'; ?>

</div>
</body>
</html>