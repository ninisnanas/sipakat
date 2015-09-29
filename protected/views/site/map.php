<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - ';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Sitemap</h1>
        <ol>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/index">Login</a></li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/sitemap">Sitemap</a></li>
          <li><a href="">Home</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/home">Home - selamat datang</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/adminhome">Home Admin</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/pusathome">Home Pusat</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/provhome">Home Provinsi</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/kabhome">Home Kabupaten</a></li>
            </ul>
          </li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/lplpo">LPLPO #</a></li>
          <li><a href="">Akun</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formakun">Create Akun</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarakun">List Akun</a></li>
            </ul>
          </li>          
          <li><a href="">Obat</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formobat">Create Obat</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarobat">List Obat</a></li>
            </ul>
          </li>
          <li><a href="">Provinsi</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formprovinsi">Create Provinsi</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarprovinsi">List Provinsi</a></li>
            </ul>
          </li>
          <li><a href="">Kabupaten</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formkab">Create Kabupaten</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarkab">List Kabupaten</a></li>
            </ul>
          </li>
          <li><a href="">Supplier</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formsupplier">Create Supplier</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarsupplier">List Supplier</a></li>
            </ul>
          </li>
          <li><a href="">Unggah</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formunggah">Form Unggah - general</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarunggahkab">Daftar Unggah Kabupaten</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/daftarunggahpuskesmas">Daftar Unggah Puskesmas</a></li>
            </ul>
          </li>
          <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/transaksipenerimaanobat">Transaksi Penerimaan Obat</a></li>
          <li><a href="">Ketersediaan Obat</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/formketersediaanobat">Ketersediaan Obat - pilih obat</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/filterketersediaan">Ketersediaan Obat - filter (optional)</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ketersediaanobat">Laporan Ketersediaan Obat</a></li>
            </ul>
          </li>
          <li><a href="">UKP4</a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/pilihobat">UKP4 - pilih obat (with sorter)</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/ukp4">UKP4 - Laporan</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/unggahukp4">UKP4 - Unggah</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/reviewunggahukp4">UKP4 - Review Unggah</a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/riwayatukp4">UKP4 - Riwayat Unggah</a></li>
            </ul>
          </li>
          <li><a href=""></a>
            <ul>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/"></a></li>
              <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/"></a></li>
            </ul>
          </li>
        </ol>
      </div>