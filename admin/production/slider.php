
<!DOCTYPE html>
<html lang="en">
  <head>
        <?php include 'inc/head.php'; ?>
  </head>

<?php 

/*KULLANICILARI LİSTELEME*/

   $slidersor=$db->prepare("SELECT * from slider");

   $slidersor->execute();


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
                <h3>SLİDER 
                  <small>
                  <?php if ($_GET['delete']=='ok') {?>
                  <b style="color: seagreen;">Silme İşlem başarılı.</b>
                  <?php }  
                  elseif ($_GET['delete']=='no') {?>
                  <b style="color: red;">Silme İşlemi başarısız.</b>
                  <?php }  ?>
                  <?php if ($_GET['update']=='ok') {?>
                  <b style="color: seagreen;">Güncelleme İşlem başarılı.</b>
                  <?php }  
                  elseif ($_GET['update']=='no') {?>
                  <b style="color: red;">Güncelleme İşlemi başarısız.</b>
                  <?php }  ?>

                  <?php if ($_GET['add']=='ok') {?>
                  <b style="color: seagreen;">Kayıt İşlemi başarılı.</b>
                  <?php }  
                  elseif ($_GET['add']=='no') {?>
                  <b style="color: red;">Kayıt İşlemi başarısız.</b>
                  <?php }  ?>
                  </small>
                </h3>
                <a href="slider_add.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
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
                          <th>Resim</th>
                          <th>Ad</th>
                          <th>Url</th>
                          <th>Sıra</th>
                          <th>Durum</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      $orderno=0;
                      while ($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $orderno++;
                        
                      



                       ?>

                        <tr>
                          <td><?php echo $orderno; ?></td>
                          <td> <img src="../../<?php echo $slidercek['slider_imgurl']; ?>" style='max-height: 50px;'> </td>
                          <td><?php echo $slidercek['slider_name']; ?></td>
                          <td><?php echo $slidercek['slider_url']; ?></td>
                          <td><?php echo $slidercek['slider_order']; ?></td>
                          <td><?php echo $slidercek['slider_statu']; ?></td>
                          <td>
                            
                            <?php 

                            if ($slidercek['slider_statu']==1) { ?>
                              
                              <button class="btn btn-success btn-xs">Aktif</button>

                            <?php } else { ?>

                              <button class="btn btn-danger btn-xs">Pasif</button>

                            <?php } ?>



                          </td>
                          <td><center><a href="slider_settings.php?slider_id=<?php echo $slidercek['slider_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../process/process.php?slider_id=<?php echo $slidercek['slider_id']; ?>&sliderdelete=ok&slider_imgold=<?php echo $slidercek['slider_imgurl']; ?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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