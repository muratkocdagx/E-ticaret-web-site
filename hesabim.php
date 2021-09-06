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
                  <div class="col-md-12">
                     	<center> <div class="bigtitle">Hesap Bilgileri</div></center>
                  </div>

               </div>
               </div>
            </div>
         </div>
      </div>
      
      <form class="form-horizontal checkout" action="admin/process/process.php" method="POST"  role="form">
         <div class="row">
            <div class="col-md-12">
               <div class="title-bg">
                  <div class="title">Hesap Bilgileri Güncelle</div>
               </div>
               <?php 

               if ($_GET['statu']== "falsep")  { ?>

								<div class="alert alert-danger" role="alert">
								  Şifreler uyuşmuyor!
								</div>
               	
               	<?php  } elseif ($_GET['statu']== "missingp") { ?>
								<div class="alert alert-danger" role="alert">
								  Şifre 6 karakterden az olamaz!
								</div>


               	<?php  } elseif ($_GET['update']== "ok") { ?>
								<div class="alert alert-success" role="alert">
								  Başarıyla Bilgilerini Güncelledin!
								</div>

               	<?php }  ?>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_name"  id="name" placeholder="Ad Soyad" required="" value="<?php echo $usercek['users_name']; ?>">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="number" class="form-control" name="users_tc"  id="name" placeholder="Tc Kimlik No" value="<?php echo $usercek['users_tc']; ?>">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="number" class="form-control" name="users_gsm"  id="name" placeholder="GSM"  value="<?php echo $usercek['users_gsm']; ?>">
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_mail" id="email" required="" placeholder="Mail" value="<?php echo $usercek['users_mail']; ?>">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-6">
                     <input type="password" class="form-control" name="users_password" id="name" required="" placeholder="Şifre" value="">
                  </div>
                  <div class="col-sm-6">
                     <input type="password" class="form-control" name="users_password2"  id="name" required="" placeholder="Şifre Tekrar" value="">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_address"  id="name" placeholder="Adres" value="<?php echo $usercek['users_address']; ?>">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_il"  id="name" placeholder="İl" value="<?php echo $usercek['users_il']; ?>">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_ilce"  id="name" placeholder="İlce" value="<?php echo $usercek['users_ilce']; ?>">
                     <input type="hidden" class="form-control" name="users_id"  id="name" value="<?php echo $usercek['users_id']; ?>">
                  </div>
               </div>

               <button type="submit" name="userupdate" class="btn btn-default btn-red">Güncelle</button>
            </div>
         </div>
      </form>
      <div class="spacer"></div>
   </div>
         <?php include 'inc/footer.php'; ?>
         <?php include 'inc/script.php'; ?>

      </div>
   </body>
</html>