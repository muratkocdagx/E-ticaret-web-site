                  <div class="col-md-3"><!--sidebar-->
                  <div class="title-bg">
                     <div class="title">Kategoriler</div>
                  </div>
                  <?php 

                     $categorysor=$db->prepare("SELECT * from category order by category_order ASC");

                     $categorysor->execute();
                   ?>
                  <div class="categorybox">
                     <ul>
                        <?php while ($categorycek=$categorysor->fetch(PDO::FETCH_ASSOC)) {?>
                        
                        <li><a href="urunler-<?=seo($categorycek["category_name"]) ?>"><?php echo $categorycek['category_name']; ?></a></li>
                        <?php } ?>

                     </ul>
                  </div>
                  
                  <div class="ads">
                     <a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
                  </div>
                  
                  
               </div>