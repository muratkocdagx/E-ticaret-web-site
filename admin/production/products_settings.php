<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'inc/head.php'; 

      $productsor=$db->prepare("SELECT * from products where product_id=:id");

      $productsor->execute(array(

       'id' => $_GET['product_id']

      ));
      $productcek=$productsor->fetch(PDO::FETCH_ASSOC);






      ?>
      <style type="text/css">
         input::-webkit-outer-spin-button,
         input::-webkit-inner-spin-button {
           -webkit-appearance: none;
         }
      </style>
   </head>
   <body class="nav-md">
      <div class="container body">
         <div class="main_container">
            <?php include 'inc/leftmenu.php'; ?>
            <?php include 'inc/topmenu.php'; ?>
            <!-- page content -->
            <div class="right_col" role="main">
               <div class="">
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                           <div class="x_title">
                              <h2>MENÜ DÜZENLEME <small>
                                 <?php if ($_GET['update']=='ok') {?>
                                 <b style="color: seagreen;">İşlem başarılı.</b>
                                 <?php }  
                                 elseif ($_GET['update']=='no') {?>
                                 <b style="color: red;">İşlem başarısız.</b>
                                 <?php }  ?>
                                 </small>
                              </h2>
                              <ul class="nav navbar-right panel_toolbox">
                                 <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                 </li>
                                 <li><a class="close-link"><i class="fa fa-close"></i></a>
                                 </li>
                              </ul>
                              <div class="clearfix"></div>
                           </div>
                           <div class="x_content">
                              <br />
                              <form action="../process/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklenme Tarihi <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" disabled="" required="required" name="product_time" value="<?php echo $productcek['product_time']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Seo Url <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" disabled="" required="required" name="product_seourl" value="<?php echo $productcek['product_seourl']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Kategori <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                       <?php 

                                       $product_id=$productcek['category_id'];

                                       $categorysor=$db->prepare("SELECT * from category where category_ust=:category_ust order by category_order ASC");
                                       $categorysor->execute(array(

                                          'category_ust' => 0

                                       ));

                                        ?>

                                       <select id="heard" class="form-control" name="category_id" required="">
                                          <?php 


                                          while ($categorycek=$categorysor->fetch(PDO::FETCH_ASSOC)) {
                                             $category_id=$categorycek['category_id'];
                                             ?>
                                        
                                          <option value="<?php echo $categorycek['category_id']; ?>" <?php if($category_id==$product_id){echo"selected='select'";} ?> ><?php echo $categorycek['category_name']; ?></option>

                                                <?php }


                                           ?>

                                      </select>



                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Adı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" required="required" name="product_name" value="<?php echo $productcek['product_name']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Fiyatı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" required="required" name="product_price" value="<?php echo $productcek['product_price']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detayı <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <textarea class="ckeditor" rows="7"  name="product_detail" style="resize:vertical; " ><?php echo $productcek['product_detail']; ?></textarea>
                                          <script>
                                          CKEDITOR.replace( 'about_content',

                                          {
                                             filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                                             filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                                             filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                                             filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                             filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                             filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                                             forcePasteAsPlainText: true

                                          }

                                           );
                                          </script>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Videosu <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name"  name="product_video" value="<?php echo $productcek['product_video']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>


                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keywords <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name"  name="product_keyword" value="<?php echo $productcek['product_keyword']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name"  name="product_stok" value="<?php echo $productcek['product_stok']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Anasayfa Vitrin <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select id="heard" class="form-control" name="product_index" required="">
                                          
                                          <option value="1" <?php echo $productcek['product_index'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                                          <option value="0" <?php echo $productcek['product_index'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                                      </select>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durumu <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select id="heard" class="form-control" name="product_statu" required="">
                                          
                                          <option value="1" <?php echo $productcek['product_statu'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                                          <option value="0" <?php echo $productcek['product_statu'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                                      </select>
                                    </div>
                                 </div>
                                       <input type="hidden" id="first-name"  name="product_id" value="<?php echo $productcek['product_id']; ?>" class="form-control col-md-7 col-xs-12">

                                 <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                       <button type="submit" name="productsettingsave" class="btn btn-success">Güncelle</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                     <!-- Bitiyor -->
                  </div>
               </div>
            </div>
            <!-- /page content -->
            <?php include 'inc/footer.php'; ?>
         </div>
      </div>
      <?php include 'inc/script.php'; ?>
   </body>
</html>