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
                        <div class="col-md-7">
                           <div class="bigtitle">Hakkımızda</div>
                        </div>
  
                     </div>
                     </div>
                  </div>
               </div>
            </div>


            <div class="row">

               <div class="col-md-9"><!--Main content-->
                  <div class="title-bg">
                     <div class="title"><?php echo $aboutcek['about_title']; ?></div>
                  </div>
                  <div class="page-content">

                     <?php echo $aboutcek['about_content']; ?>

                  </div>

                  <div class="title-bg">
                     <div class="title">Misyonumuz</div>
                  </div>
                  <div class="page-content">

                     <?php echo $aboutcek['about_mission']; ?>

                  </div>

                  <div class="title-bg">
                     <div class="title">Vizyonumuz</div>
                  </div>
                  <div class="page-content">

                     <?php echo $aboutcek['about_vision']; ?>

                  </div>
                  <br>
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $aboutcek['about_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

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