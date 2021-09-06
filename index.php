<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'inc/head.php'; ?>
</head>
<body>
   <div id="wrapper">
    <?php include 'inc/header.php'; ?>

    <div class="container">
     <?php include 'inc/slider.php'; ?>

     <div class="bar"></div>
     <div id="sync2" class="owl-carousel">
      <?php 


      while ($slidercek=$slidersor2->fetch(PDO::FETCH_ASSOC)) { 





        ?>
        <div class="item">
         <div class="slide-type-1-sync">
            <h3><?php echo $slidercek['slider_name']; ?></h3>
         </div>
      </div>
   <?php } ?>

</div>

</div>
<div class="f-widget featpro">
   <div class="container">
      <div class="title-widget-bg">
         <div class="title-widget">Öne Çıkan Ürünler</div>
         <div class="carousel-nav">
            <a class="prev"></a>
            <a class="next"></a>
         </div>
      </div>
      <div id="product-carousel" class="owl-carousel owl-theme">


         <?php 

         $productsor=$db->prepare("SELECT * from products where product_statu=:product_statu and product_index=:product_index");

         $productsor->execute(array(

          'product_index' => 1,
          'product_statu' => 1

       ));





         while ($productcek=$productsor->fetch(PDO::FETCH_ASSOC)) {
            ?>



            <div class="item">
               <div class="productwrap">
                  <div class="pr-img">
                     <div class="hot"></div>
                     <a href="urun-<?=seo($productcek["product_name"]) ?>"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
                     <div class="pricetag blue">
                        <div class="inner"><span><?php echo $productcek['product_price']; ?>₺</span></div>
                     </div>
                  </div>
                  <span class="smalltitle"><a href="urun-<?=seo($productcek["product_name"]) ?>"><?php echo $productcek['product_name']; ?></a></span>
                  <span class="smalldesc">Ürün Kodu: <?php echo $productcek['product_id']; ?></span>
               </div>
            </div>
         <?php } ?>
      </div>
   </div>
</div>

<div class="container">
   <div class="row">
      <div class="col-md-9">
         <!--Main content-->
         <div class="title-bg">
            <div class="title">Hakkımızda</div>
         </div>
         <p class="ct">
            <?php echo substr($aboutcek['about_content'],0,1000) ?>
         </p>
         <a href="about" class="btn btn-default btn-red btn-sm">Devamını oku</a>
         <div class="title-bg">
            <div class="title">Lastest Products</div>
         </div>
         <div class="row prdct">
            <!--Products-->


            <?php 
            $productsor=$db->prepare("SELECT * from products where product_statu=:product_statu order by product_id DESC limit 6 ");

            $productsor->execute(array(

             'product_statu' => 1

          ));
            while ($productcek=$productsor->fetch(PDO::FETCH_ASSOC)) {


              ?>
              <div class="col-md-4">
               <div class="productwrap">
                  <div class="pr-img">
                     <a href="urun-<?=seo($productcek["product_name"]) ?>"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
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
   <!--Main content-->
   <?php include'inc/sidebar.php'; ?>
   <!--sidebar-->
</div>
</div>
<?php include 'inc/footer.php'; ?>
<?php include 'inc/script.php'; ?>

</div>
</body>
</html>