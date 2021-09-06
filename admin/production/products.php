
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'inc/head.php'; ?>
  <style type="text/css">
  .product_detail p{ float: left; }  

</style>
</head>

<?php 



$productsor=$db->prepare("SELECT * from products order by product_id ASC");

$productsor->execute();




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
                  <?php if ($_GET['update']=='ok') {?>
                    <b style="color: seagreen;">Kayıt İşlemi başarılı.</b>
                  <?php }  
                  elseif ($_GET['update']=='no') {?>
                    <b style="color: red;">Kayıt İşlemi başarısız.</b>
                  <?php }  ?>
                  <?php if ($_GET['showcase']=='ok') {?>
                    <b style="color: seagreen;">Vitrine eklendi.</b>
                  <?php }  
                  elseif ($_GET['showcase']=='no') {?>
                    <b style="color: red;">Vitrinden kaldırıldı.</b>
                  <?php }  ?>
                  <?php if ($_GET['statu']=='ok') {?>
                    <b style="color: seagreen;">Ürün Aktif.</b>
                  <?php }  
                  elseif ($_GET['statu']=='no') {?>
                    <b style="color: red;">Ürün Pasif.</b>
                  <?php }  ?>

                </small>
              </h3>
              <a href="products_add.php"><button class="btn btn-success btn-xs">Yeni Ekle</button></a>
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
                        <th>Ürün Adı</th>
                        <th>Ürün Detay</th>
                        <th>Ürün Fiyat</th>
                        <th>Ürün Stok</th>
                        <th>Ürün Vitrin</th>
                        <th>Ürün Durum</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                      $orderno=0;
                      while ($productcek=$productsor->fetch(PDO::FETCH_ASSOC)) { $orderno++;



                        $detail_kelime=strlen($productcek['product_detail']);

                        ?>

                        <tr>
                          <td><?php echo $orderno; ?></td>
                          <td><?php echo $productcek['product_name']; ?></td>
                          <td class="product_detail"><?php echo mb_substr($productcek['product_detail'], 0, 55); if($detail_kelime > 55){ ?>...<?php } ?></td>
                          <td><?php echo $productcek["product_price"]; ?></td>
                          <td><?php echo $productcek['product_stok']; ?></td>


                          <td>

                            <?php 

                            if ($productcek['product_index']==1) { ?>

                              <center><button class="btn btn-success btn-xs"><a style="color:white;" href="../process/process.php?product_id=<?php echo $productcek['product_id']; ?>&showcase=no">Aktif</a></button></center>

                            <?php } else { ?>

                              <center><button class="btn btn-danger btn-xs"><a style="color:white;" href="../process/process.php?product_id=<?php echo $productcek['product_id']; ?>&showcase=ok">Pasif</a></button></center>

                            <?php } ?>



                          </td>

                          <td>

                            <?php 

                            if ($productcek['product_statu']==1) { ?>

                              <center><button class="btn btn-success btn-xs"><a style="color:white;" href="../process/process.php?product_id=<?php echo $productcek['product_id']; ?>&statu=no">Aktif</a></button></center>

                            <?php } else { ?>

                              <center><a style="color:white;" href="../process/process.php?product_id=<?php echo $productcek['product_id']; ?>&statu=ok"><button class="btn btn-danger btn-xs">Pasif</a></button></center>

                            <?php } ?>



                          </td>


                          <td><center><a href="products_settings.php?product_id=<?php echo $productcek['product_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                          <td><center><a href="../process/process.php?product_id=<?php echo $productcek['product_id']; ?>&productdelete=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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