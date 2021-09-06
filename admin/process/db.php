<?php 

try{

$db= new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','');
/*echo "Veritabanı başarılı.";*/

}
catch(PDOExpception $e){

	echo $e->getMessage();

}




 ?>