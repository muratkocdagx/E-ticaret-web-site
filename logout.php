<?php 
session_start();


unset($_SESSION['userskullanici_mail']);
/*BURDA KULLANICI KISMI ÇIKARKEN ADMİNDEN ÇIKMIYOR FAKAT ADMİNDE BÖYLE BİR KARŞILAŞTIRMA YAPTIRMADIGIMIZ İÇİN ORDA session_destroy KULLANIYORUM*/


header("Location:index.php?statu=exit");

 ?>