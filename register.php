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
                     	<center> <div class="bigtitle">Kayıt Ol</div></center>
                  </div>

               </div>
               </div>
            </div>
         </div>
      </div>
      
      <form class="form-horizontal checkout" action="admin/process/process.php" method="POST"  role="form">
         <div class="row">
            <div class="col-md-6">
               <div class="title-bg">
                  <div class="title">Kayıt Bilgileri</div>
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


               	<?php  } elseif ($_GET['statu']== "thereisauser") { ?>
								<div class="alert alert-danger" role="alert">
								  Kullanıcı sisteme kayıtlı!
								</div>


               	<?php  } elseif ($_GET['statu']== "usersave") { ?>
								<div class="alert alert-success" role="alert">
								  Başarıyla kayıt olundu!
								</div>

               	<?php }  ?>
               <div class="form-group dob">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_name"  id="name" placeholder="Ad Soyad Giriniz">
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-12">
                     <input type="text" class="form-control" name="users_mail" id="email" placeholder="Email Giriniz">
                  </div>
               </div>
               <div class="form-group dob">
                  <div class="col-sm-6">
                     <input type="text" class="form-control" name="users_password" id="phone" placeholder="Şifre Giriniz">
                  </div>
                  <div class="col-sm-6">
                     <input type="text" class="form-control" name="users_password2"  id="phone" placeholder="Şifre Giriniz">
                  </div>
               </div>
               <button type="submit" name="userssave" class="btn btn-default btn-red">Kayıt Ol</button>
            </div>
            <div class="col-md-6">
               <div class="title-bg">
                  <div class="title">Şifrenizi mi Unuttunuz?</div>
               </div>

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