 <?php 
ob_start();
session_start();
   include 'admin/process/db.php';
   include 'admin/process/fonksiyon.php';
/*Settings sayfası için */
   $settingsor=$db->prepare("SELECT * from settings where settings_id=:id");

   $settingsor->execute(array(

    ':id' => 0

   ));

   $settingscek=$settingsor->fetch(PDO::FETCH_ASSOC);

/*Settings sayfası için */

   $aboutsor=$db->prepare("SELECT * from about where about_id=:id");

   $aboutsor->execute(array(

    ':id' => 0

   ));

   $aboutcek=$aboutsor->fetch(PDO::FETCH_ASSOC);

   $menusor=$db->prepare("SELECT * from menu where menu_id=:id");

   $menusor->execute(array(

    ':id' => 0

   ));




      $usersor=$db->prepare("SELECT * from users where users_mail=:mail");

   if (!empty($_SESSION['userskullanici_mail'])) {
         $usersor->execute(array(

       'mail' => $_SESSION['userskullanici_mail']

      ));
   }
   $say=$usersor->rowCount();
   $usercek=$usersor->fetch(PDO::FETCH_ASSOC);

    ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo $settingscek['settings_title']; ?></title>
	  <meta name="description" content="<?php echo $settingscek['settings_description']; ?>">
	  <meta name="keywords" content="<?php echo $settingscek['settings_keywords']; ?>">
	  <meta name="author" content="<?php echo $settingscek['settings_author']; ?>">

      <!-- Fonts -->
      <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
      <link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
      <!-- Bootstrap -->
      <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
      <!-- Main Style -->
      <link rel="stylesheet" href="style.css">
      <!-- owl Style -->
      <link rel="stylesheet" href="css\owl.carousel.css">
      <link rel="stylesheet" href="css\owl.transitions.css">
      <!-- fancy Style -->
      <link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">

      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
             <style type="text/css">
         input::-webkit-outer-spin-button,
         input::-webkit-inner-spin-button {
           -webkit-appearance: none;
         }

      </style>