<?php
ob_start();
session_start();
include 'db.php';
include 'fonksiyon.php';

if (!empty($_GET['productdelete']))
{

    if ($_GET['productdelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from products where product_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['product_id']

        ));

        if ($kontrol)
        {
            header("Location:../production/products.php?delete=ok");
        }
        else
        {
            header("Location:../production/products.php?delete=no");

        }
    }
}

if (!empty($_GET['categorydelete']))
{

    if ($_GET['categorydelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from category where category_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['category_id']

        ));

        if ($kontrol)
        {
            header("Location:../production/category.php?delete=ok");
        }
        else
        {
            header("Location:../production/category.php?delete=no");

        }
    }
}


if (!empty($_GET['showcase']))
{

    if ($_GET['showcase'] == "no")
    {
        $productindexupdate = $db->prepare("UPDATE products SET

            product_index=:product_index
            WHERE product_id={$_GET['product_id']}");

        $update = $productindexupdate->execute(array(

            'product_index' => 0

        ));

        if ($update)
        {
            header("Location:../production/products.php?showcase=no");
        }
        else
        {
            header("Location:../production/products.php?showcase=error");

        }
    }
    elseif ($_GET['showcase'] == "ok"){

        $productindexupdate = $db->prepare("UPDATE products SET

            product_index=:product_index
            WHERE product_id={$_GET['product_id']}");

        $update = $productindexupdate->execute(array(

            'product_index' => 1

        ));

        if ($update)
        {
            header("Location:../production/products.php?showcase=ok");
        }
        else
        {
            header("Location:../production/products.php?showcase=error");

        }
    }
}

if (!empty($_GET['statu']))
{

    if ($_GET['statu'] == "no")
    {
        $productstatuupdate = $db->prepare("UPDATE products SET

            product_statu=:product_statu
            WHERE product_id={$_GET['product_id']}");

        $update = $productstatuupdate->execute(array(

            'product_statu' => 0

        ));

        if ($update)
        {
            header("Location:../production/products.php?statu=no");
        }
        else
        {
            header("Location:../production/products.php?statu=error");

        }
    }
    elseif ($_GET['statu'] == "ok"){

        $productstatuupdate = $db->prepare("UPDATE products SET

            product_statu=:product_statu
            WHERE product_id={$_GET['product_id']}");

        $update = $productstatuupdate->execute(array(

            'product_statu' => 1

        ));

        if ($update)
        {
            header("Location:../production/products.php?statu=ok");
        }
        else
        {
            header("Location:../production/products.php?statu=error");

        }
    }
}
if (isset($_POST['categoryadd']))
{
    $category_seourl = seo($_POST['category_name']);

    $categoryadd = $db->prepare("INSERT INTO category SET 

        category_name=:category_name,
        category_ust=:category_ust,
        category_seourl=:category_seourl,
        category_order=:category_order,
        category_statu=:category_statu


        ");
    $statu = $categoryadd->execute(array(

        'category_name' => $_POST['category_name'],
        'category_ust' => $_POST['category_ust'],
        'category_order' => $_POST['category_order'],
        'category_seourl' => $category_seourl,
        'category_statu' => $_POST['category_statu']

    ));
    if ($statu)
    {
        header("Location:../production/category.php?add=ok");
    }
    else
    {
        header("Location:../production/category.php?add=no");

    }

}



if (isset($_POST['categorysettingssave']))
{

    $category_id = $_POST['category_id'];

    $category_seourl = seo($_POST['category_name']);

    $categorysave = $db->prepare("UPDATE category SET

        category_name=:category_name,
        category_ust=:category_ust,
        category_seourl=:category_seourl,
        category_order=:category_order,
        category_statu=:category_statu

        WHERE category_id={$_POST['category_id']}");

    $update = $categorysave->execute(array(

        'category_name' => $_POST['category_name'],
        'category_ust' => $_POST['category_ust'],
        'category_order' => $_POST['category_order'],
        'category_statu' => $_POST['category_statu'],
        'category_seourl' => $category_seourl
    ));

    if ($update)
    {

        header("Location:../production/category_settings.php?category_id=$category_id&update=ok");

    }
    else
    {
        header("Location:../production/category_settings.php?category_id=$category_id&update=no");

    }

}


if (isset($_POST['userupdate']))
{
    $users_password = $_POST['users_password'];
    $users_password2 = $_POST['users_password2'];

    if ($users_password == $users_password2)
    {

        if (strlen($users_password) > 5)
        {

            $users_name =htmlspecialchars($_POST['users_name']);

            $users_mail =htmlspecialchars($_POST['users_mail']);
            $users_password = md5($_POST['users_password']);
            $users_address =htmlspecialchars($_POST['users_address']);
            $users_il =htmlspecialchars($_POST['users_il']);
            $users_ilce =htmlspecialchars($_POST['users_ilce']);


            $userupdate = $db->prepare("UPDATE users SET


              users_name=:users_name,
              users_tc=:users_tc,
              users_gsm=:users_gsm,
              users_mail=:users_mail,
              users_password=:users_password,
              users_address=:users_address,
              users_il=:users_il,
              users_ilce=:users_ilce
              WHERE users_id={$_POST['users_id']}

              ");

            $update = $userupdate->execute(array(

                'users_name' => $users_name,
                'users_tc' => $_POST['users_tc'],
                'users_gsm' => $_POST['users_gsm'],
                'users_mail' => $users_mail,
                'users_password' => $users_password,
                'users_address' => $users_address,
                'users_il' => $users_il,
                'users_ilce' => $users_ilce

            ));

            if ($update)
            {

                header("Location:../../hesabim?update=ok");

            }
            else
            {
                header("Location:../../hesabim?update=no");

            }

        }
        else
        {
            header("Location:../../hesabim?statu=missingp");

        }

    }
    else
    {
        header("Location:../../hesabim?statu=falsep");
    }


}

if (isset($_POST['userslogin'])){

    $users_mail =htmlspecialchars($_POST['users_mail']);
    $users_password = md5($_POST['users_password']);

    $usersor = $db->prepare("SELECT * FROM users where users_mail=:mail and users_password=:password and users_yetki=:yetki and users_durum=:durum");

    $usersor->execute(array(

        'mail' => $users_mail,
        'password' => $users_password,
        'durum' => 1,
        'yetki' => 2

    ));

    $say = $usersor->rowCount();

    if ($say == 1)
    {
        echo $_SESSION['userskullanici_mail'] = $users_mail;
        header("Location:../../");

    }
    else
    {
        header("Location:../../?login=no");
    }





}



if (isset($_POST['userssave']))
{

    $users_mail = htmlspecialchars($_POST['users_mail']);
    $users_name = htmlspecialchars($_POST['users_name']);

    $users_password = $_POST['users_password'];
    $users_password2 = $_POST['users_password2'];

    if ($users_password == $users_password2)
    {

        if (strlen($users_password) > 5)
        {

            $usersave=$db->prepare("select * from users where users_mail=:users_mail");
            $usersave->execute(array(

                'users_mail' => $users_mail

            ));

            $say = $usersave->rowCount();


            
            if ($say == 0)
            {

                $password = md5($users_password);

                $users_statu = 2;
                $users_durum = 1;

                $usersave = $db->prepare("INSERT INTO users SET 

                    users_mail=:users_mail,
                    users_name=:users_name,
                    users_password=:users_password,
                    users_durum=:users_durum,
                    users_yetki=:users_yetki

                    ");

                $statu = $usersave->execute(array(

                    'users_mail' => $_POST['users_mail'],
                    'users_name' => $_POST['users_name'],
                    'users_password' => $password,
                    'users_durum' => $users_durum,
                    'users_yetki' => $users_statu

                ));
                if ($statu)
                {

                 header("Location:../../register.php?statu=usersave");

             }
         }
         else
         {
            header("Location:../../register.php?statu=thereisauser");

        }




    }
    else
    {
        header("Location:../../register.php?statu=missingp");

    }

}
else
{
    header("Location:../../register.php?statu=falsep");
}

}

if (isset($_POST['slideradd']))
{

    $upload_dir = '../../img/slider';
    @$tmp_name = $_FILES['slider_imgurl']['tmp_name'];
    @$name = $_FILES['slider_imgurl']['name'];

    $number1 = rand(2000, 32000);
    $number2 = rand(2000, 32000);
    $number3 = rand(2000, 32000);
    $number4 = rand(2000, 32000);
    $numbername = $number1 . $number2 . $number3 . $number4;
    $refimgurl = substr($upload_dir, 6) . "/" . $numbername . $name;
    @move_uploaded_file($tmp_name, "$upload_dir/$numbername$name");

    $save = $db->prepare("INSERT INTO slider SET 

      slider_name=:slider_name,
      slider_imgurl=:slider_imgurl,
      slider_order=:slider_order,
      slider_url=:slider_url,
      slider_statu=:slider_statu


      ");

    $statu = $save->execute(array(

        'slider_name' => $_POST['slider_name'],
        'slider_order' => $_POST['slider_order'],
        'slider_url' => $_POST['slider_url'],
        'slider_statu' => $_POST['slider_statu'],
        'slider_imgurl' => $refimgurl
    ));

    if ($statu)
    {

        header("Location:../production/slider.php?add=ok");

    }
    else
    {

        header("Location:../production/slider.php?add=no");
    }

}

if (!empty($_GET['sliderdelete']))
{
    if ($_GET['sliderdelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from slider where slider_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['slider_id']

        ));

        if ($kontrol)
        {
            $imagedelete = $_GET['slider_imgold'];
            unlink("../../$imagedelete");

            header("Location:../production/slider.php?delete=ok");
        }
        else
        {
            header("Location:../production/slider.php?delete=no");

        }
    }
}

if (isset($_POST['sliderupdate']))
{

    $slider_id = $_POST['slider_id'];

    $upload_dir = '../../img/slider';
    @$tmp_name = $_FILES['slider_imgurl']['tmp_name'];
    @$name = $_FILES['slider_imgurl']['name'];

    $number1 = rand(2000, 32000);
    $number2 = rand(2000, 32000);
    $number3 = rand(2000, 32000);
    $number4 = rand(2000, 32000);
    $numbername = $number1 . $number2 . $number3 . $number4;

    if (!empty($tmp_name))
    {

        $refimgurl = substr($upload_dir, 6) . "/" . $numbername . $name;
        @move_uploaded_file($tmp_name, "$upload_dir/$numbername$name");

        $save = $db->prepare("UPDATE slider SET 

           slider_name=:slider_name,
           slider_imgurl=:slider_imgurl,
           slider_order=:slider_order,
           slider_url=:slider_url,
           slider_statu=:slider_statu
           WHERE slider_id={$_POST['slider_id']}");

        $statu = $save->execute(array(

            'slider_name' => $_POST['slider_name'],
            'slider_order' => $_POST['slider_order'],
            'slider_url' => $_POST['slider_url'],
            'slider_statu' => $_POST['slider_statu'],
            'slider_imgurl' => $refimgurl
        ));
    }
    else
    {

        $save = $db->prepare("UPDATE slider SET 

           slider_name=:slider_name,
           slider_order=:slider_order,
           slider_url=:slider_url,
           slider_statu=:slider_statu
           WHERE slider_id={$_POST['slider_id']}");

        $statu2 = $save->execute(array(

            'slider_name' => $_POST['slider_name'],
            'slider_order' => $_POST['slider_order'],
            'slider_url' => $_POST['slider_url'],
            'slider_statu' => $_POST['slider_statu']
        ));
    }

    if ($statu)
    {

        $imagedelete = $_POST['slider_imgurlold'];
        unlink("../../$imagedelete");

        header("Location:../production/slider.php?update=ok");

    }
    if ($statu2)
    {
        header("Location:../production/slider.php?update=ok");

    }

    else
    {

        header("Location:../production/slider.php?update=no");
    }

}

if (isset($_POST['logosave']))
{

    $uploads_dir = '../../img';
    @$tmp_name = $_FILES['settings_logo']["tmp_name"];
    @$name = $_FILES['settings_logo']["name"];

    if (!empty($tmp_name))
    {

        $sayi = rand(20000, 32000);
        echo $refimg = substr($uploads_dir, 6) . "/" . $sayi . $name;
        @move_uploaded_file($tmp_name, "$uploads_dir/$sayi$name");

        $update = $db->prepare("UPDATE settings SET 
          settings_logo=:logo
          WHERE settings_id=0");
        $status = $update->execute(array(

            'logo' => $refimg

        ));

    }

    if ($update)
    {

        $imagedelete = $_POST['eski_yol'];
        unlink("../../$imagedelete");
        header("Location:../production/general_settings.php?statu=ok");

    }
    else
    {

        header("Location:../production/general_settings.php?statu=no");
    }
}

if (isset($_POST['adminlogin']))
{

    $users_mail = $_POST['users_mail'];
    $users_password = md5($_POST['users_password']);

    $usersor = $db->prepare("SELECT * FROM users where users_mail=:mail and users_password=:password and users_yetki=:yetki");

    $usersor->execute(array(

        'mail' => $users_mail,
        'password' => $users_password,
        'yetki' => 1

    ));

    echo $say = $usersor->rowCount();

    if ($say == 1)
    {

        $_SESSION['users_mail'] = $users_mail;
        header("Location:../production/index.php");

    }
    else
    {

        header("Location:../production/login.php?status=no");
    }

}

if (isset($_POST['generalsettingssave']))
{

    $settingssave = $db->prepare("UPDATE settings SET

      settings_title=:settings_title,
      settings_description=:settings_description,
      settings_keywords=:settings_keywords,
      settings_author=:settings_author

      WHERE settings_id=0

      ");

    $update = $settingssave->execute(array(

        'settings_title' => $_POST['settings_title'],
        'settings_description' => $_POST['settings_description'],
        'settings_keywords' => $_POST['settings_keywords'],
        'settings_author' => $_POST['settings_author']

    ));

    if ($update)
    {

        header("Location:../production/general_settings.php?update=ok");

    }
    else
    {
        header("Location:../production/general_settings.php?update=no");

    }

}

if (isset($_POST['contactsettingssave']))
{

    $settingssave = $db->prepare("UPDATE settings SET


      settings_number=:settings_number,
      settings_gsm=:settings_gsm,
      settings_fax=:settings_fax,
      settings_mail=:settings_mail,
      settings_ilce=:settings_ilce,
      settings_il=:settings_il,
      settings_adress=:settings_adress,
      settings_mesai=:settings_mesai
      WHERE settings_id=0

      ");

    $update = $settingssave->execute(array(

        'settings_number' => $_POST['settings_number'],
        'settings_gsm' => $_POST['settings_gsm'],
        'settings_fax' => $_POST['settings_fax'],
        'settings_mail' => $_POST['settings_mail'],
        'settings_ilce' => $_POST['settings_ilce'],
        'settings_il' => $_POST['settings_il'],
        'settings_adress' => $_POST['settings_adress'],
        'settings_mesai' => $_POST['settings_mesai']

    ));

    if ($update)
    {

        header("Location:../production/contact_settings.php?update=ok");

    }
    else
    {
        header("Location:../production/contact_settings.php?update=no");

    }

}

if (isset($_POST['apisettingssave']))
{

    $settingssave = $db->prepare("UPDATE settings SET


      settings_zopim=:settings_zopim,
      settings_analytics=:settings_analytics,
      settings_maps=:settings_maps
      WHERE settings_id=0

      ");

    $update = $settingssave->execute(array(

        'settings_maps' => $_POST['settings_maps'],
        'settings_zopim' => $_POST['settings_zopim'],
        'settings_analytics' => $_POST['settings_analytics']

    ));

    if ($update)
    {

        header("Location:../production/api_settings.php?update=ok");

    }
    else
    {
        header("Location:../production/api_settings.php?update=no");

    }

}

if (isset($_POST['socialsettingssave']))
{

    $settingssave = $db->prepare("UPDATE settings SET


      settings_facebook=:settings_facebook,
      settings_twitter=:settings_twitter,
      settings_google=:settings_google,
      settings_youtube=:settings_youtube
      WHERE settings_id=0

      ");

    $update = $settingssave->execute(array(

        'settings_facebook' => $_POST['settings_facebook'],
        'settings_twitter' => $_POST['settings_twitter'],
        'settings_google' => $_POST['settings_google'],
        'settings_youtube' => $_POST['settings_youtube']

    ));

    if ($update)
    {

        header("Location:../production/socialmedia_settings.php?update=ok");

    }
    else
    {
        header("Location:../production/socialmedia_settings.php?update=no");

    }

}

if (isset($_POST['mailsettingssave']))
{

    $settingssave = $db->prepare("UPDATE settings SET


      settings_smtphost=:settings_smtphost,
      settings_smtpuser=:settings_smtpuser,
      settings_smtphostpassword=:settings_smtphostpassword,
      settings_smtpport=:settings_smtpport
      WHERE settings_id=0

      ");

    $update = $settingssave->execute(array(

        'settings_smtphost' => $_POST['settings_smtphost'],
        'settings_smtpuser' => $_POST['settings_smtpuser'],
        'settings_smtphostpassword' => $_POST['settings_smtphostpassword'],
        'settings_smtpport' => $_POST['settings_smtpport']

    ));

    if ($update)
    {

        header("Location:../production/mail_settings.php?update=ok");

    }
    else
    {
        header("Location:../production/mail_settings.php?update=no");

    }

}

if (isset($_POST['aboutsettingssave']))
{

    $aboutsave = $db->prepare("UPDATE about SET


      about_title=:about_title,
      about_content=:about_content,
      about_video=:about_video,
      about_mission=:about_mission,
      about_vision=:about_vision
      WHERE about_id=0

      ");

    $update = $aboutsave->execute(array(

        'about_title' => $_POST['about_title'],
        'about_content' => $_POST['about_content'],
        'about_video' => $_POST['about_video'],
        'about_mission' => $_POST['about_mission'],
        'about_vision' => $_POST['about_vision']

    ));

    if ($update)
    {

        header("Location:../production/about.php?update=ok");

    }
    else
    {
        header("Location:../production/about.php?update=no");

    }

}

if (isset($_POST['userssettingssave']))
{

    $users_id = $_POST['users_id'];

    $settingssave = $db->prepare("UPDATE users SET

      users_tc=:users_tc,
      users_name=:users_name,
      users_gsm=:users_gsm,
      users_durum=:users_durum

      WHERE users_id={$_POST['users_id']}");

    $update = $settingssave->execute(array(

        'users_tc' => $_POST['users_tc'],
        'users_name' => $_POST['users_name'],
        'users_gsm' => $_POST['users_gsm'],
        'users_durum' => $_POST['users_durum']

    ));

    if ($update)
    {

        header("Location:../production/users_settings.php?users_id=$users_id&update=ok");

    }
    else
    {
        header("Location:../production/users_settings.php?users_id=$users_id&update=no");

    }

}

if (!empty($_GET['userdelete']))
{

    if ($_GET['userdelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from users where users_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['users_id']

        ));

        if ($kontrol)
        {
            header("Location:../production/users.php?delete=ok");
        }
        else
        {
            header("Location:../production/users.php?delete=no");

        }
    }
}
if (isset($_POST['menusettingssave']))
{

    $menu_id = $_POST['menu_id'];

    $menu_seourl = seo($_POST['menu_name']);

    $menusave = $db->prepare("UPDATE menu SET

      menu_name=:menu_name,
      menu_detail=:menu_detail,
      menu_url=:menu_url,
      menu_order=:menu_order,
      menu_seourl=:menu_seourl,
      menu_status=:menu_status

      WHERE menu_id={$_POST['menu_id']}");

    $update = $menusave->execute(array(

        'menu_name' => $_POST['menu_name'],
        'menu_detail' => $_POST['menu_detail'],
        'menu_url' => $_POST['menu_url'],
        'menu_order' => $_POST['menu_order'],
        'menu_seourl' => $menu_seourl,
        'menu_status' => $_POST['menu_status']

    ));

    if ($update)
    {

        header("Location:../production/menu_settings.php?menu_id=$menu_id&update=ok");

    }
    else
    {
        header("Location:../production/menu_settings.php?menu_id=$menu_id&update=no");

    }

}

if (!empty($_GET['menudelete']))
{

    if ($_GET['menudelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from menu where menu_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['menu_id']

        ));

        if ($kontrol)
        {
            header("Location:../production/menu.php?delete=ok");
        }
        else
        {
            header("Location:../production/menu.php?delete=no");

        }
    }
}
if (isset($_POST['menuadd']))
{
    $menu_seourl = seo($_POST['menu_name']);

    $menuadd = $db->prepare("INSERT INTO menu SET 

      menu_name=:menu_name,
      menu_detail=:menu_detail,
      menu_url=:menu_url,
      menu_order=:menu_order,
      menu_seourl=:menu_seourl,
      menu_status=:menu_status


      ");
    $statu = $menuadd->execute(array(

        'menu_name' => $_POST['menu_name'],
        'menu_detail' => $_POST['menu_detail'],
        'menu_url' => $_POST['menu_url'],
        'menu_order' => $_POST['menu_order'],
        'menu_seourl' => $menu_seourl,
        'menu_status' => $_POST['menu_status']

    ));
    if ($statu)
    {
        header("Location:../production/menu.php?add=ok");
    }
    else
    {
        header("Location:../production/menu.php?add=no");

    }

}



if (isset($_POST['productsettingsave']))
{
    $product_seourl = seo($_POST['product_name']);

    $productadd = $db->prepare("UPDATE products SET 

        category_id=:category_id,
        product_name=:product_name,
        product_price=:product_price,
        product_detail=:product_detail,
        product_keyword=:product_keyword,
        product_stok=:product_stok,
        product_statu=:product_statu,
        product_seourl=:product_seourl,
        product_index=:product_index,
        product_video=:product_video
        where product_id={$_POST['product_id']}


        ");
    $statu = $productadd->execute(array(

        'category_id' => $_POST['category_id'],
        'product_name' => $_POST['product_name'],
        'product_price' => $_POST['product_price'],
        'product_detail' => $_POST['product_detail'],
        'product_keyword' => $_POST['product_keyword'],
        'product_stok' => $_POST['product_stok'],
        'product_statu' => $_POST['product_statu'],
        'product_index' => $_POST['product_index'],
        'product_seourl' => $product_seourl ,
        'product_video' => $_POST['product_video']

    ));
    if ($statu)
    {
        header("Location:../production/products.php?update=ok");
    }
    else
    {
        header("Location:../production/products.php?update=no");

    }

}

if (isset($_POST['productadd']))
{
    $product_seourl = seo($_POST['product_name']);

    $productadd = $db->prepare("INSERT INTO products SET 

        category_id=:category_id,
        product_name=:product_name,
        product_price=:product_price,
        product_detail=:product_detail,
        product_keyword=:product_keyword,
        product_stok=:product_stok,
        product_statu=:product_statu,
        product_seourl=:product_seourl,
        product_index=:product_index,
        product_video=:product_video
        


        ");
    $statu = $productadd->execute(array(

        'category_id' => $_POST['category_id'],
        'product_name' => $_POST['product_name'],
        'product_price' => $_POST['product_price'],
        'product_detail' => $_POST['product_detail'],
        'product_keyword' => $_POST['product_keyword'],
        'product_stok' => $_POST['product_stok'],
        'product_statu' => $_POST['product_statu'],
        'product_index' => $_POST['product_index'],
        'product_seourl' => $product_seourl ,
        'product_video' => $_POST['product_video']

    ));
    if ($statu)
    {
        header("Location:../production/products.php?add=ok");
    }
    else
    {
        header("Location:../production/products.php?add=no");

    }

}
if (isset($_POST['comments_add']))
{

    $url=$_POST['url'];
    $product_id=$_POST['product_id'];

    $commentsadd = $db->prepare("INSERT INTO comments SET 

      comments_detail=:comments_detail,
      product_id=:product_id,
      user_id=:user_id

      ");
    $statu = $commentsadd->execute(array(

        'comments_detail' => $_POST['comments_detail'],
        'product_id' => $_POST['product_id'],
        'user_id' => $_POST['users_id']

    ));
    if ($statu)
    {
        header("Location:$url?add=ok");
    }
    else
    {
        header("Location:$url?add=no");

    }

}
if (!empty($_GET['commentsdelete']))
{

    if ($_GET['commentsdelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from comments where comments_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['comments_id']

        ));

        if ($kontrol)
        {
            header("Location:../production/comments.php?delete=ok");
        }
        else
        {
            header("Location:../production/comments.php?delete=no");

        }
    }
}

if (isset($_POST['commentssettingsave']))
{

    $comments_id = $_POST['comments_id'];


    $menusave = $db->prepare("UPDATE comments SET

      comments_detail=:comments_detail,
      comments_statu=:comments_statu


      WHERE comments_id={$_POST['comments_id']}");

    $update = $menusave->execute(array(

        'comments_statu' => $_POST['comments_statu'],
        'comments_detail' => $_POST['comments_detail']

    ));

    if ($update)
    {

        header("Location:../production/comments_settings.php?comments_id=$comments_id&update=ok");

    }
    else
    {
        header("Location:../production/comments_settings.php?comments_id=$comments_id&update=no");

    }

}


if (isset($_POST['hamperadd']))
{

    $product_id=$_POST['product_id'];

    $hamperadd = $db->prepare("INSERT INTO hamper SET 

      user_id=:user_id,
      product_id=:product_id,
      product_adet=:product_adet

      ");
    $statu = $hamperadd->execute(array(

        'product_adet' => $_POST['product_adet'],
        'product_id' => $_POST['product_id'],
        'user_id' => $_POST['user_id']

    ));
    if ($statu)
    {
        header("Location:../../sepet?add=ok");
    }
    else
    {
        header("Location:../../sepet?add=no");

    }
}


if (!empty($_GET['hamperdelete']))
{

    if ($_GET['hamperdelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from hamper where hamper_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['hamper_id']

        ));

        if ($kontrol)
        {
            header("Location:../../sepet");
        }
        else
        {
            header("Location:../../sepet");

        }
    }
}

if (!empty($_GET['commentsstatu']))
{

    if ($_GET['commentsstatu'] == "no")
    {
        $productindexupdate = $db->prepare("UPDATE comments SET

            comments_statu=:comments_statu
            WHERE comments_id={$_GET['comments_id']}");

        $update = $productindexupdate->execute(array(

            'comments_statu' => 0

        ));

        if ($update)
        {
            header("Location:../production/comments.php?commentsstatu=no");
        }
        else
        {
            header("Location:../production/comments.php?commentsstatu=error");

        }
    }
    elseif ($_GET['commentsstatu'] == "ok"){

        $productindexupdate = $db->prepare("UPDATE comments SET

            comments_statu=:comments_statu
            WHERE comments_id={$_GET['comments_id']}");

        $update = $productindexupdate->execute(array(

            'comments_statu' => 1

        ));

        if ($update)
        {
            header("Location:../production/comments.php?commentsstatu=ok");
        }
        else
        {
            header("Location:../production/products.php?commentsstatu=error");

        }
    }
}


if (isset($_POST['bankasettingssave']))
{

    $banka_id = $_POST['banka_id'];


    $bankasave = $db->prepare("UPDATE banka SET

        banka_name=:banka_name,
        banka_iban=:banka_iban,
        banka_namesurname=:banka_namesurname,
        banka_statu=:banka_statu

        WHERE banka_id={$_POST['banka_id']}");

    $update = $bankasave->execute(array(

        'banka_name' => $_POST['banka_name'],
        'banka_iban' => $_POST['banka_iban'],
        'banka_namesurname' => $_POST['banka_namesurname'],
        'banka_statu' => $_POST['banka_statu']
    ));

    if ($update)
    {

        header("Location:../production/banka_settings.php?banka_id=$banka_id&update=ok");

    }
    else
    {
        header("Location:../production/banka_settings.php?banka_id=$banka_id&update=no");

    }

}

if (isset($_POST['bankaadd']))
{

    $bankaadd = $db->prepare("INSERT INTO banka SET 

        banka_name=:banka_name,
        banka_iban=:banka_iban,
        banka_namesurname=:banka_namesurname,
        banka_statu=:banka_statu


        ");
    $statu = $bankaadd->execute(array(

        'banka_name' => $_POST['banka_name'],
        'banka_iban' => $_POST['banka_iban'],
        'banka_namesurname' => $_POST['banka_namesurname'],
        'banka_statu' => $_POST['banka_statu']

    ));
    if ($statu)
    {
        header("Location:../production/banka.php?add=ok");
    }
    else
    {
        header("Location:../production/banka.php?add=no");

    }

}
if (!empty($_GET['bankadelete']))
{

    if ($_GET['bankadelete'] == "ok")
    {
        $delete = $db->prepare("DELETE from banka where banka_id=:id");
        $kontrol = $delete->execute(array(

            'id' => $_GET['banka_id']

        ));

        if ($kontrol)
        {
            header("Location:../production/banka.php?delete=ok");
        }
        else
        {
            header("Location:../production/banka.php?delete=no");

        }
    }
}


if (isset($_POST['ordersaveeft']))
{



    $siparis_tip="Banka Havalesi";


    $bankaadd = $db->prepare("INSERT INTO siparis SET 

        user_id=:user_id,
        siparis_tip=:siparis_tip,
        siparis_banka=:siparis_banka,
        siparis_toplam=:siparis_toplam

        ");
    $statu = $bankaadd->execute(array(

        'user_id' => $_POST['user_id'],
        'siparis_tip' => $siparis_tip,
        'siparis_banka' =>  $_POST['banka_id'],
        'siparis_toplam' => $_POST['siparis_toplam']
    ));
    
    if ($statu)
    {

     $siparis_id = $db->lastInsertId();



     $user_id=$_POST['user_id'];



     $hampersor=$db->prepare("SELECT * from hamper where user_id=:user_id");

     $hampersor->execute(array(

      'user_id' => $user_id


  ));

     while ($hampercek=$hampersor->fetch(PDO::FETCH_ASSOC)) {

        $product_id=$hampercek['product_id'];
        $product_adet=$hampercek['product_adet'];


        $productsor=$db->prepare("SELECT * from products where product_id=:id");

        $productsor->execute(array(

            'id' => $product_id

        ));

        $productcek=$productsor->fetch(PDO::FETCH_ASSOC);

        $urun_fiyat=$productcek['product_price'];

        $kaydet = $db->prepare("INSERT INTO siparis_detay SET 

            siparis_id=:siparis_id,
            product_id=:product_id,
            product_price=:product_price,
            product_adet=:product_adet

            "); 
        $statu = $kaydet->execute(array(

            'siparis_id' => $siparis_id,
            'product_id' => $product_id,
            'product_adet' => $product_adet,
            'product_price' =>  $urun_fiyat
        ));

    }

    if ($statu)
    {


                $delete = $db->prepare("DELETE from hamper where user_id=:id");
                $kontrol = $delete->execute(array(

                    'id' => $user_id

                ));

                header("Location:../../siparislerim?statu=ok");


    }



}
else
{


    //header("Location:../production/banka.php?add=no");


}

}

?>
