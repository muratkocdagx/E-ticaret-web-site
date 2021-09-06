
<!DOCTYPE html>
<html lang="en">
  <head>
        <?php include 'inc/head.php'; ?>
  </head>

<?php 

/*KULLANICILARI LİSTELEME*/

   $usersor=$db->prepare("SELECT * from users");

   $usersor->execute();


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
                <h3>Kullanıcılar 
                  <small>
                  <?php if ($_GET['delete']=='ok') {?>
                  <b style="color: seagreen;">İşlem başarılı.</b>
                  <?php }  
                  elseif ($_GET['delete']=='no') {?>
                  <b style="color: red;">İşlem başarısız.</b>
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
                          <th>Kayıt Tarih</th>
                          <th>Ad Soyad</th>
                          <th>Mail Adresi</th>
                          <th>Telefon</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 

                      while ($usercek=$usersor->fetch(PDO::FETCH_ASSOC)) {
                        
                      



                       ?>

                        <tr>
                          <td><?php echo $usercek['users_time']; ?></td>
                          <td><?php echo $usercek['users_name']; ?></td>
                          <td><?php echo $usercek['users_mail']; ?></td>
                          <td><?php echo $usercek['users_gsm']; ?></td>
                          <td><center><a href="users_settings.php?users_id=<?php echo $usercek['users_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../process/process.php?users_id=<?php echo $usercek['users_id']; ?>&userdelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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