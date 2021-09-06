
<!DOCTYPE html>
<html lang="en">
  <head>
        <?php include 'inc/head.php'; ?>
  </head>

<?php 

/*KULLANICILARI LİSTELEME*/

   $bankasor=$db->prepare("SELECT * from banka order by banka_id ASC");

   $bankasor->execute();


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
                <h3>BANKALAR 
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
                <a href="banka_add.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
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
                          <th>Kategori Adı</th>
                          <th>Kategori Url</th>
                          <th>Kategori Sıra</th>
                          <th>Kategori Durum</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      $orderno=0;
                      while ($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { $orderno++;
                        
                      



                       ?>

                        <tr>
                          <td><?php echo $orderno; ?></td>
                          <td><?php echo $bankacek['banka_name']; ?></td>
                          <td><?php echo $bankacek['banka_iban']; ?></td>
                          <td><?php echo $bankacek['banka_namesurname']; ?></td>
                          <td>
                            
                            <?php 

                            if ($bankacek['banka_statu']==1) { ?>
                              
                              <center><button class="btn btn-success btn-xs">Aktif</button></center>

                            <?php } else { ?>

                              <center><button class="btn btn-danger btn-xs">Pasif</button></center>

                            <?php } ?>



                          </td>
                          <td><center><a href="banka_settings.php?banka_id=<?php echo $bankacek['banka_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../process/process.php?banka_id=<?php echo $bankacek['banka_id']; ?>&bankadelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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