        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldiniz</span>
                <h2><?php echo $usercek['users_name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menü</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa</a></li>

                  
                  <li><a href="about.php"><i class="fa fa-cogs"></i> Hakkımızda</a>
                  <li><a href="users.php"><i class="fa fa-users"></i> Kullanıcılar</a>
                  <li><a href="menu.php"><i class="fa fa-list"></i> Menüler</a>
                  <li><a href="category.php"><i class="fa fa-list"></i> Kategoriler</a>
                  <li><a href="products.php"><i class="fa fa-cubes"></i> Ürünler</a>
                  <li><a href="comments"><i class="fa fa-list"></i> Yorumlar</a>
                  <li><a href="slider.php"><i class="fa fa-image"></i> Slider</a>
                  <li><a><i class="fa fa-cogs"></i>Site Ayarları <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="general_settings.php">Genel Ayarlar</a></li>
                      <li><a href="contact_settings.php">İletişim Ayarları</a></li>
                      <li><a href="api_settings.php">Api Ayarları</a></li>
                      <li><a href="banka.php">Banka Ayarları</a></li>
                      <li><a href="socialmedia_settings.php">Sosyal Medya Ayarları</a></li>
                      <li><a href="mail_settings.php">Mail Ayarları</a></li>
                    </ul>
                  </li>

                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>