
<!DOCTYPE html>
<html lang="en">
  <head>
        <?php include 'inc/head.php'; ?>
  </head>

<?php 

/*KULLANICILARI LİSTELEME*/

   $commentssor=$db->prepare("SELECT * from comments order by comments_id ASC");

   $commentssor->execute();


/*KULLANICILARI LİSTELEME*/


 ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <?php include 'inc/leftmenu.php'; ?>

        <?php include 'inc/topmenu.php'; ?>


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>MENÜLER 
                  <small>
                  <?php if ($_GET['delete']=='ok') {?>
                  <b style="color: seagreen;">Silme İşlemi başarılı.</b>
                  <?php }  
                  elseif ($_GET['delete']=='no') {?>
                  <b style="color: red;">Silme İşlemi başarısız.</b>
                  <?php }  ?>
                  <?php if ($_GET['add']=='ok') {?>
                  <b style="color: seagreen;">Kayıt İşlemi başarılı.</b>
                  <?php }  
                  elseif ($_GET['add']=='no') {?>
                  <b style="color: red;">Kayıt İşlemi başarısız.</b>
                  <?php }  ?>
                  </small>
                </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Ürün</th>
                          <th>Yorum İçeriği</th>
                          <th>Yorum Tarihi</th>
                          <th>Yorum Durumu</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      $orderno=0;
                      while ($commentscek=$commentssor->fetch(PDO::FETCH_ASSOC)) { $orderno++;
                        
                      



                       ?>

                        <tr>
                          <td><?php echo $orderno; ?></td>
                          <td><?php echo $commentscek['product_id']; ?></td>
                          <td><?php echo $commentscek['comments_detail']; ?></td>
                          <td><?php echo $commentscek['comments_time']; ?></td>
                          <td>
                            

                            <?php 

                            if ($commentscek['comments_statu']==1) { ?>

                              <center><button class="btn btn-success btn-xs"><a style="color:white;" href="../process/process.php?comments_id=<?php echo $commentscek['comments_id'];?>&commentsstatu=no">Aktif</a></button></center>

                            <?php } else { ?>

                              <center><button class="btn btn-danger btn-xs"><a style="color:white;" href="../process/process.php?comments_id=<?php echo $commentscek['comments_id'];?>&commentsstatu=ok">Pasif</a></button></center>

                            <?php } ?>



                          </td>
                          <td><center><a href="comments_settings.php?comments_id=<?php echo $commentscek['comments_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../process/process.php?comments_id=<?php echo $commentscek['comments_id']; ?>&commentsdelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                        </tr>

                        <?php 
                        }

                        ?>

                      </tbody>
                    </table>

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