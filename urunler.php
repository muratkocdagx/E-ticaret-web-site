<!DOCTYPE html>
<html lang="en">
   <head>
		<?php include 'inc/head.php'; 

      if (isset($_GET['sef'])) {
         
      $categorysor=$db->prepare("SELECT * from category where category_seourl=:category_seourl");

      $categorysor->execute(array(

         'category_seourl' => $_GET['sef']

      ));

      $categorycek=$categorysor->fetch(PDO::FETCH_ASSOC);

      $category_id=$categorycek['category_id'];


      $productsor=$db->prepare("SELECT * from products where category_id=:category_id order by product_id ASC");

      $productsor->execute(array(

         'category_id' => $category_id

      ));

      $say=$productsor->rowCount();

      } 
      else{

      $productsor=$db->prepare("SELECT * from products order by product_id ASC");

      $productsor->execute();


      }




      ?>
   </head>
   <body>
      <div id="wrapper">
      	<?php include 'inc/header.php'; ?>

   
         <div class="container">



            <div class="row">

         <div class="col-md-9"><!--Main content-->
            <div class="title-bg">
               <div class="title">
                  
                  <?php if (isset($_GET['sef'])) {
                     echo $categorycek['category_name'];
                  } 
                  else{
                     echo "Ürünler";
                  }
                  ?>




               </div>

            </div>
            <div class="row prdct"><!--Products-->


               <?php 

                   if ($say==0 & isset($_GET['sef'])) {
                      echo "Bu Kategori De Ürün Bulunamadı";
                   }
                      while ($productcek=$productsor->fetch(PDO::FETCH_ASSOC)) {

                ?>

               <div class="col-md-4">
                  <div class="productwrap">
                     <div class="pr-img">
                        <div class="hot"></div>
                        <a href="urun-<?=seo($productcek["product_name"]) ?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
                        <div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $productcek['product_price']*1.50 ?>₺</span><?php echo $productcek['product_price']; ?>₺</span></div></div>
                     </div>
                     <span class="smalltitle"><a href="urun-<?=seo($productcek["product_name"]) ?>"><?php echo $productcek['product_name']; ?></a></span>
                     <span class="smalldesc">Ürün Kodu: <?php echo $productcek['product_id']; ?></span>
                  </div>
               </div>

            <?php } ?>

            </div><!--Products-->
            <ul class="pagination shop-pag"><!--pagination-->
               <li><a href="#"><i class="fa fa-caret-left"></i></a></li>
               <li><a href="#">1</a></li>
               <li><a href="#">2</a></li>
               <li><a href="#">3</a></li>
               <li><a href="#">4</a></li>
               <li><a href="#">5</a></li>
               <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
            </ul><!--pagination-->

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