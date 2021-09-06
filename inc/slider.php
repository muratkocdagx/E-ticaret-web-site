            <?php 
            if (isset($_SESSION['userskullanici_mail'])) { ?>


       
            <ul class="small-menu">
               <!--small-nav -->
               <li><a href="hesabim" class="myacc">Hesabım</a></li>
               <li><a href="siparislerim" class="myshop">Siparişlerim</a></li>
               <li><a href="logout" class="mycheck">Güvenli Çıkış</a></li>
            </ul>

            <?php } ?>

            <!--small-nav -->
            <div class="clearfix"></div>
            <div class="lines"></div>

            <?php 

               $slidersor=$db->prepare("SELECT * from slider");

               $slidersor->execute();

               $slidersor2=$db->prepare("SELECT * from slider");

               $slidersor2->execute();

             ?>



            <div class="main-slide">
               <div id="sync1" class="owl-carousel">
                  <?php 

                      
                      while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { 
                        
                      



                       ?>
                  <div class="item">
                     <div class="slide-desc">
                        <div class="inner">
                           <h1><?php echo $slidercek['slider_name']; ?></h1>

                           <a href="<?php echo $slidercek['slider_url']; ?>" class="btn btn-default btn-red btn-lg">Add to cart</a>
                        </div>
                     </div>
                     <div class="slide-type-1">
                        <img src="<?php echo $slidercek['slider_imgurl']; ?>" alt="" class="img-responsive">
                     </div>
                  </div>
               <?php } ?>
               </div>
            </div>
            

