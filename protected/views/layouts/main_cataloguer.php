<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css "/>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/table.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="body-mask">
  <header>
  	<nav>
  		<ul>
        <li>
          <a href="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </li>
        <li class="">
          <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/index">Beranda</a>
        </li>
        <li class="menu-group">
          <a class="dropdown" href="">Demo</a>
          <ul>
      			<li class="menu-group">
      			  <a class="dropdown2" href="">Form</a>
      			  <ul>

        				<li>
        				  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formakun">Buat Akun</a>
        				</li>
        				<li>
        				  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formobat">Buat Obat</a>
        				</li>
        				<li>
        				  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formprovinsi">Buat Provinsi</a>
        				</li>
        				<li>
        				  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formkab">Buat Kab./Kota</a>
        				</li>
        				<li>
        				  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formsupplier">Buat Supplier</a>

      			  </ul>
      			</li>
            <li class="menu-group">
              <a class="dropdown2" href="">Daftar</a>
              <ul>

                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarakun">Daftar Akun</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarobat">Daftar Obat</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarprovinsi">Daftar Provinsi</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarkab">Daftar Kab./Kota</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarsupplier">Daftar Supplier</a>
                </li>

              </ul>
            </li>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/lplpo">LPLPO</a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formunggah">Unggah Laporan</a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarunggahkab">Daftar Unggah Kab</a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarunggahpuskesmas">Daftar Unggah Puskesmas</a>
            </li>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/transaksi">Transaksi Penerimaan Obat</a>
            </li>
          </ul>
        </li>
        <li class="menu-group">
          <a class="dropdown" href="">Obat</a>
          <ul>
            <li>
              <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formketersediaanobat">Ketersediaan Obat</a>
            </li>
            <li class="disabled">
              <a href="">Mutasi Obat</a>
            </li>
            <li class="disabled">
              <a href="">Daftar Kadaluarsa</a>
            </li>
          </ul>
        </li>
        <li class="menu-group">
          <a class="dropdown" href="">Unggah</a>
          <ul>
            <li class="disabled"><a href="">Unggah LPLPO</a></li>
            <li class="disabled"><a href="">Unggah Non LPLPO</a></li>
            <li class="disabled">
              <a class="dropdown2" href="">Daftar Unggah</a>
              <ul>
                <li class="disabled"><a href="">Unggah LPLPO</a></li>
                <li class="disabled"><a href="">Unggah Non LPLPO</a></li>
                <li class="disabled"><a href="">Daftar Unggah</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="menu-group">
          <a class="dropdown" href="">Unduh</a>
          <ul>
            <li><a href="">Template laporan</a></li>
            <li><a href="">Lihat/Unduh Daftar Obat</a></li>
            <li><a href="">Lihat/Unduh Daftar Suplier</a></li>
          </ul>
        </li>
        <li class="menu-group">
          <a class="dropdown" href="">Panduan</a>
          <ul>
            <li class="disabled"><a href="">Panduan A</a></li>
            <li class="disabled"><a href="">Panduan B</a></li>
            <li class="disabled"><a href="">Panduan C</a></li>
          </ul>
        </li>

        <!-- NAVIGATION - RIGHT SIDE -->
        <div class="stick-right">
          <li class="menu-group">
            <a class="dropdown" href="">Administrator</a>
            <ul>
              <li><a href="">Lihat Profil</a></li>
              <li><a href="">Ubah Profil</a></li>
            </ul>
          </li>
          <li>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/logout" class="logout">logout</a>
          </li>
        </div>
      </ul>
    </nav>
  </header>

  <div class="container">
    <div class="r-row wrapper" id="wrapper">
      <div class="large-2 column left">
        <ul class="side-menu">
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formobat">Manajemen Obat</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formobat">Buat Obat</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarobat">Daftar Obat</a>
                </li>
            </ul>
          </li>
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formsupplier">Manajemen Supplier</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formsupplier">Buat Supplier</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarsupplier">Daftar Supplier</a>
                </li>
            </ul>
          </li>
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formprovinsi">Manajemen Provinsi</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formprovinsi">Buat Provinsi</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarprovinsi">Daftar Provinsi</a>
                </li>
            </ul>
          </li>
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formkab">Manajemen Kabupaten</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formkab">Buat Kab./Kota</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarkab">Daftar Kab./Kota</a>
                </li>
            </ul>
          </li>
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formpuskesmas">Manajemen Puskesmas</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formpuskesmas">Daftar Obat</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarpuskesmas">Daftar Puskesmas</a>
                </li>
            </ul>
          </li>
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formakun">Manajemen Akun</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formakun">Buat Akun</a>
                </li>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarakun">Daftar Akun</a>
                </li>
            </ul>
          </li>
          <li class="">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=">Manajemen Kegiatan Non-LPLPO</a>
            <ul>
                <li>
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarobat">Daftar Obat</a>
                </li>
            </ul>
          </li>
        </ul> 
      </div>
      <div class="large-10 column right">
        <?php echo $content; ?>
      </div>
    </div> <!-- WRAPPER END -->
  </div> <!-- CONTAINER END -->
  
  <footer>
  <p class="copyright">Lorem Ipsum Dolor Sit Amet<br/>© 2013</p>
  </footer>
</div>
</body>
</html>

