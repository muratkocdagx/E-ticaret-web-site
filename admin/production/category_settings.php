<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'inc/head.php'; 

      $categorysor=$db->prepare("SELECT * from category where category_id=:id");

      $categorysor->execute(array(

       'id' => $_GET['category_id']

      ));
      $categorycek=$categorysor->fetch(PDO::FETCH_ASSOC);






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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Ad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" required="required" name="category_name" value="<?php echo $categorycek['category_name']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>


                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Üst <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="first-name" required="required" name="category_ust" value="<?php echo $categorycek['category_ust']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>


                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Seo Url <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name"  name="category_seourl" disabled="" value="<?php echo $categorycek['category_seourl']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" required="required" name="category_order" value="<?php echo $categorycek['category_order']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select id="heard" class="form-control" name="category_statu" required="">
                                          
                                          <option value="1" <?php echo $categorycek['category_statu'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                                          <option value="0" <?php echo $categorycek['category_statu'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                                      </select>
                                    </div>
                                 </div>
                                       <input type="hidden" id="first-name" required="required"  name="category_id" value="<?php echo $categorycek['category_id']; ?>" class="form-control col-md-7 col-xs-12">

                                 <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                       <button type="submit" name="categorysettingssave" class="btn btn-success">Güncelle</button>
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