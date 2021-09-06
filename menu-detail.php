<!DOCTYPE html>
<html lang="en">
   <head>
		<?php include 'inc/head.php'; 



   $menudetailsor=$db->prepare("SELECT * from menu where menu_seourl=:seourl");

   $menudetailsor->execute(array(

    'seourl' => $_GET['sef']

   ));

   $menudetailcek=$menudetailsor->fetch(PDO::FETCH_ASSOC);

      ?>

   </head>
   <body>
      <div id="wrapper">
      	<?php include 'inc/header.php'; ?>

   
         <div class="container">

            <div class="row">

               <div class="col-md-9"><!--Main content-->
                  <div class="title-bg">
                     <div class="title"><?php echo $menudetailcek['menu_name']; ?></div>
                  </div>
                  <div class="page-content">

                     <?php echo $menudetailcek['menu_detail']; ?>

                  </div>


               </div>
               <?php include 'inc/sidebar.php'; ?>
            </div>
            <div class="spacer"></div>
         </div>
         <?php include 'inc/footer.php'; ?>
         <?php include 'inc/script.php'; ?>

      </div>
   </body>
</html>