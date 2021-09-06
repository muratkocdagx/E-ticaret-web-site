<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'inc/head.php'; ?>
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
                              <h2>APİ AYARLARI <small>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Analytics Kodu <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" name="settings_analytics" value="<?php echo $settingscek['settings_analytics']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Maps Kodu <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" name="settings_maps" value="<?php echo $settingscek['settings_maps']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Canlı Destek Kodu <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" name="settings_zopim" value="<?php echo $settingscek['settings_zopim']; ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                       <button type="submit" name="apisettingssave" class="btn btn-success">Güncelle</button>
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