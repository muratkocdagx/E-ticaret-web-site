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
                        <div class="bigtitle">Sipariş Bilgilerim</div>
                        <div class="">Verilen Siparişler</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="title-bg">
         <div class="title">Sipariş Bilgileri</div>
      </div>
      
      <div class="table-responsive">
         <table class="table table-bordered chart">
            <thead>
               <tr>
                  <th>Sipariş No</th>
                  <th>Tarih</th>
                  <th>Tutar</th>
                  <th>Ödeme Yöntemi</th>
                  <th>Durum</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               <?php 


               $user_id=$usercek['users_id'];

               $siparissor=$db->prepare("SELECT * from siparis where user_id=:user_id");

               $siparissor->execute(array(

                  'user_id' => $user_id


               ));
               

               while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) {
                  $siparis_id =$sipariscek['siparis_id'];
                 ?>
                 <tr>
                  <td><?php echo $sipariscek['siparis_id'] ?></td>
                  <td><?php echo $sipariscek['siparis_time'] ?></td>
                  <td><?php echo $sipariscek['siparis_toplam'] ?></td>
                  <td><?php echo $sipariscek['siparis_tip'] ?></td>
                  <td>
                     
                     <?php 

                     $siparis_durumu=$sipariscek['siparis_odeme'];

                     if ($siparis_durumu==0) { echo "Ödeme Bekleniyor.";} 

                     elseif($siparis_durumu==1){echo "Ödeme Tamamlandı.";}
                     ?>


                  </td>
                  <td><center><a href="siparis-detay?siparis_id=<?php echo $siparis_id?>"><button class="btn btn-primary btn-xs">Detay</button></a></center></td>
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