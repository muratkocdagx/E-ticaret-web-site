<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'inc/head.php';?>
      <style type="text/css">
         input::-webkit-outer-spin-button,
         input::-webkit-inner-spin-button {
           -webkit-appearance: none;
         }

<?php 

/*KULLANICILARI LİSTELEME*/

   $slidersor=$db->prepare("SELECT * from slider");

   $slidersor->execute();

$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);
/*KULLANICILARI LİSTELEME*/


 ?>
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
                              <h2>SLİDER DÜZENLE
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
                              <form action="../process/process.php" method="POST" id="demo-form2" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">




                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" required="required" name="slider_name" value="<?php echo $slidercek['slider_name']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>

                               <div class="form-group">
                                 <label for="resim-sec" class="control-label col-md-3 col-sm-3 col-xs-12">Resim Seç</label>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                   <input type="file" id="logo" name="slider_imgurl" class="form-control col-md-7 col-xs-12">
                                   <input type="hidden" id="logo" name="slider_imgurlold" value="<?php echo $slidercek['slider_imgurl']; ?>" class="form-control col-md-7 col-xs-12">
                                 </div>
                               </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Url <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" name="slider_url" value="<?php echo $slidercek['slider_url']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                   <input type="hidden"  name="slider_id" value="<?php echo $slidercek['slider_id']; ?>" class="form-control col-md-7 col-xs-12">

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="first-name" required="required" name="slider_order" value="<?php echo $slidercek['slider_order']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select id="heard" class="form-control" name="slider_statu" required="">
                                          
                                          <option value="1" <?php echo $slidercek['slider_statu'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                                          <option value="0" <?php echo $slidercek['slider_statu'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                                      </select>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                       <button type="submit" name="sliderupdate" class="btn btn-success">Kaydet</button>
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