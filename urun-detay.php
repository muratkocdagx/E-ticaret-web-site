<!DOCTYPE html>
<html lang="en">
<head>
   <?php include 'inc/head.php';


   $productsor=$db->prepare("SELECT * from products where product_seourl=:product_seourl order by product_id ASC");

   $productsor->execute(array(

      'product_seourl' =>$_GET['sef']


   ));
   $productcek=$productsor->fetch(PDO::FETCH_ASSOC);

   $productcategory=$productcek['category_id'];


   $categorysor=$db->prepare("SELECT * from category where category_id =:category_id");

   $categorysor->execute(array(

      'category_id' => $productcategory

   ));
   $categorycek=$categorysor->fetch(PDO::FETCH_ASSOC);

   ?>



   <?php 


   if (!empty($_GET['add'])){

      if ($_GET['add'] =="ok") { ?>

       <script type="text/javascript">
          alert("Yorum Başarıyla Eklendi.");
       </script>

    <?php } elseif($_GET['add'] == 'no') { ?>

       <script type="text/javascript">
          alert("Yorum Ekleme Başarısız.");
       </script>

    <?php } } ?>

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
                           <div class="bigtitle"><?php echo $categorycek['category_name']; ?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-9">
               <!--Main content-->
               <div class="title-bg">
                  <div class="title"><?php echo $productcek['product_name']; ?></div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="dt-img">
                        <div class="detpricetag">
                           <div class="inner"><?php echo $productcek['product_price']; ?>₺</div>
                        </div>
                        <a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
                     </div>
                     <div class="thumb-img">
                        <a class="fancybox" href="images\sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
                     </div>
                     <div class="thumb-img">
                        <a class="fancybox" href="images\sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-5.jpg" alt="" class="img-responsive"></a>
                     </div>
                     <div class="thumb-img">
                        <a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
                     </div>
                  </div>
                  <div class="col-md-6 det-desc">
                     <div class="productdata">
                        <div class="infospan">Ürün Kodu <span><?php echo $productcek['product_id']; ?></span></div>
                        <div class="infospan">Ürün Fiyat <span><?php echo $productcek['product_price']; ?></span></div>
                        <br>
                        <form action="admin/process/process.php" method="POST">
                        <div class="form-group">
                           <label for="qty" class="col-sm-2 control-label">Adet</label>
                           <div class="col-sm-4">
                              <input type="number" name="product_adet" value="1" class="form-control">
                              <input type="hidden"  name="user_id" value="<?php echo $usercek['users_id']; ?>" class="form-control">
                              <input type="hidden"  name="product_id" value="<?php echo $productcek['product_id']; ?>" class="form-control">
                           </div>
                           <div class="col-sm-4">
                              <button class="btn btn-default btn-red btn-sm" name="hamperadd" type="submit"><span class="addchart">Sepete ekle</span></button>
                           </div>
                           <div class="clearfix"></div>
                        </div>
                        </form>
                        <div class="sharing">
                           <?php if ($productcek['product_stok']>=1) {?>
                              <div class="avatock"><span>Stok Adeti: <?php echo $productcek['product_stok']; ?></span></div>
                           <?php } else { ?>
                              <div class="avatock"><span>Stoklar Tükenmiştir</span></div>
                           <?php } ?>
                        </div>
                     </div>
                  </div>
               </div>
               <?php 


               $product_id=$productcek['product_id'];

               $commentssor=$db->prepare("SELECT * FROM comments where product_id=:product_id");
               $commentssor->execute(array(
                  'product_id' => $product_id
               ));
               $commentnum= $commentssor->rowCount();


               ?>
               <div class="tab-review">
                  <ul id="myTab" class="nav nav-tabs shop-tab">
                     <li class="
                     <?php if(empty($_GET['add'])){ ?>
                        active
                     <?php  } ?>
                     "><a href="#desc" data-toggle="tab">Ürün Açıklama</a></li>
                     <li class="

                     <?php if(isset($_GET['add'])){ ?>
                        active
                     <?php  } ?>
                     "><a href="#rev" data-toggle="tab">Yorumlar (<?php echo $commentnum; ?>)</a></li>
                     <li class=""><a href="#video" data-toggle="tab">Ürün Videosu</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content shop-tab-ct">
                     <div class="tab-pane fade 
                     <?php if(empty($_GET['add'])){ ?>
                        active in
                     <?php  } ?>

                     " id="desc">
                     <p>

                        <?php echo $productcek['product_detail']; ?>


                     </p>
                  </div>
                  <div class="tab-pane fade 

                  <?php if(isset($_GET['add'])){ ?>
                     active in
                  <?php  } ?>
                  " id="rev">


                  <?php 





                  while ($commentscek=$commentssor->fetch(PDO::FETCH_ASSOC)) {

                     $commentuser_id=$commentscek['user_id'];

                     

                     $usercommentsor=$db->prepare("SELECT * from users where users_id=:id");

                     $usercommentsor->execute(array(

                       'id' => $commentuser_id

                    ));
                     $usercommentcek=$usercommentsor->fetch(PDO::FETCH_ASSOC);
                     $comments_statu=$commentscek['comments_statu'];

                     if ($comments_statu == 1) {
                        
                    
                     ?>




                     <p class="dash">
                        <span><?php echo $usercommentcek['users_name']; ?></span> <?php echo $commentscek['comments_time']; ?> <br><br>
                        <?php echo $commentscek['comments_detail']; ?>  

                     </p>

                  <?php  } } ?>



                  <?php if (isset($_SESSION['userskullanici_mail'])) {
                     ?>
                     <h4>Yorum Yazın</h4>
                     <form role="form" action="admin/process/process.php" method="POST">
                        <div class="form-group">
                           <textarea class="form-control" id="text" placeholder="Lütfen yorumunuzu yazın..." name="comments_detail"></textarea>
                           <input type="hidden"  name="url" value="<?php echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>">

                           <input type="hidden"  name="product_id" value="<?php echo $productcek['product_id']; ?>">
                           <input type="hidden"  name="users_id" value="<?php echo $usercek['users_id']; ?>">

                        </div>
                        <button type="submit" name="comments_add" class="btn btn-default btn-red btn-sm">Gönder</button>
                     </form>
                  <?php } else { ?>
                     <h4>Yorum Yazabilmek İçin Giriş Yapmalısınız. Kayıtlı değilseniz <a href="register" style="color: red;">buradan</a> kayıt olabilirsiniz.</h4>


                  <?php } ?>
               </div>
               <div class="tab-pane fade" id="video">
                  <p>

                     <?php 
                     $productvideo=strlen($productcek['product_video']);

                     if ($productvideo>0) {

                        ?>



                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $productcek['product_video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                     <?php } else { echo "Ürüne Video Eklenmemiştir.";}?>



                  </p>
               </div>
            </div>
         </div>
         <div id="title-bg">
            <div class="title">Benzer Ürünler</div>
         </div>
         <div class="row prdct">
            <!--Products-->

            <?php 

            $category_id=$productcek['category_id'];

            $productaltsor=$db->prepare("SELECT * from products where category_id=:category_id order by product_id DESC limit 3");

            $productaltsor->execute(array(

               'category_id' => $category_id

            ));

            while ($productcek=$productaltsor->fetch(PDO::FETCH_ASSOC)) {

             ?>

             <div class="col-md-4">
               <div class="productwrap">
                  <div class="pr-img">
                     <div class="hot"></div>
                     <a href="urun-<?=seo($productcek["product_name"]) ?>"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
                     <div class="pricetag on-sale">
                        <div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $productcek['product_price']*1.50; ?></span><?php echo $productcek['product_price']; ?></span></div>
                     </div>
                  </div>
                  <span class="smalltitle"><a href="urun-<?=seo($productcek["product_name"]) ?>"><?php echo $productcek['product_name']; ?></a></span>
                  <span class="smalldesc">Ürün Kodu: <?php echo $productcek['product_id']; ?></span>
               </div>
            </div>
         <?php } ?>
      </div>
      <!--Products-->
      <div class="spacer"></div>
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