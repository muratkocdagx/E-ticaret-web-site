<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include 'inc/head.php';?>
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
                              <h2>MENÜ EKLE
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
                                       <input type="text" id="first-name" required="required" name="menu_name" value="" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <textarea class="ckeditor" rows="7"  name="menu_detail" style="resize:vertical; " ></textarea>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" name="menu_url" value="" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="first-name" required="required" name="menu_order" value="" class="form-control col-md-7 col-xs-12">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select id="heard" class="form-control" name="menu_status" required="">
                                          
                                          <option value="1" selected="">Aktif</option>
                                          <option value="0">Pasif</option>

                                      </select>
                                    </div>
                                 </div>

                                 <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" align="right">
                                       <button type="submit" name="menuadd" class="btn btn-success">Kaydet</button>
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