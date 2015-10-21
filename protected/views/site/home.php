<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="box">
    <div class="col-lg-12 text-center">
    	<div style="width:76%; margin:auto;">
    	<?php $path =Yii::app()->baseUrl.'/img/'; 
    		$this->widget('ext.OrbitSlider.OrbitSlider',

			array(
			'content'=>array(
			array(
			'image'=>true, 'file'=>$path.'slide-1.jpg', 'url'=>'http://www.google.com/', 'style'=>'background-color:white;', 'caption'=>'',
			), array(

			'image'=>true, 'file'=>$path.'slide-2.jpg', 'url'=>'#', 'style'=>'background-color:white;', 'caption'=>'Optional Caption',
			), array(

			'image'=>true, 'file'=>$path.'slide-3.jpg', 'style'=>'background-color:white;',
			), array(

			'image'=>true, 'file'=>$path.'slide-4.jpg', 'url'=>'#', 'style'=>'background-color:white;', 'caption'=>'What a pretty picture',
			),

			), 'slider_options'=>array(

			'animation'=>'horizontal-slide', 'bullets'=>true, 'directionalNav'=>true, 'advanceSpeed'=>'8000',
			), 'width'=>'843', 'height'=>'403',

			)
			); ?>
		</div>
		<div>
        <h2 class="brand-before">
            <small><br />Selamat Datang di</small>
        </h2>
    </div>
        <h1 class="brand-name">Sistem Informasi Pengkajian Kriptografi Terpadu</h1>
        <hr class="tagline-divider">
        <!-- <h2>
            <small>Oleh
                <strong>Bidang Algoritma</strong>
            </small>
        </h2> -->
    </div>
</div>

<div class="box">
		<div class="col-md-3 product">
			<h4>Deputi III</h4>
			<ul>
				<li>Bidang Menejemen Kunci Sandi</li>
				<li>Bidang Algoritma</li>
				<li>Bidang Perangkat Lunak</li>
				<li>Bidang Perangkat Keras</li>
				<li>Bidang Jaringan</li>
				<li>Bidang Materiil Komunikasi Sandi</li>
			</ul>
		</div>
		<div class="col-md-3 product">
			<h4>Bentuk Koordinasi</h4>
			<ul>
				<li>Perencanaan Pengkajian Berupa Produk (Software / Hardware)</li>
				<li>Perencanaan Pengkajian Berupa Peraturan dan Kebijakan</li>
				<li>Perencanaan Kegiatan Seminar Dalam dan Luar Negeri</li>
				<li>Perencanaan Kegiatan Pelatihan</li>
				<li>Perencanaan Pengadaan Barang Pendukung Kegiatan Pengkajian</li>
			</ul>
		</div>
    	<div class="col-md-3 product">
			<h4>Fitur SIPaKaT</h4>
			<ul>
				<li>Penjadwalan Kegiatan (e-Scheduling)</li>
				<li>Monitoring Kegiatan Berjalan (e-Monitoring)</li>
				<li>Evaluasi Kegiatan (e-Evaluate)</li>
				<li>Rekap Lakip (e-Report)</li>	
			</ul>
		</div>										
		<div class="col-md-3 product">
			<!--container <h4>Tujuan</h4>
			<ul>
				<li>Membentuk Suasana Kerjasama Antar Lingkungan Deputi III</li>
				<li>Melakukan Koordinasi Kegiatan pada Lingkungan Deputi III</li>
				<li>Membantu Pengawasan Pelaksanaan Kegiatan oleh Pimpinan (Deputi III)</li>
				<li>Mencapai Tujuan Sesuai Perencanaan</li>
			</ul>-->						
			<h4>Versi Pengembangan</h4>
			<ul>
				<li>1.0.0 (13 Agustus 2015)</li>							
				<li>1.0.2 (1 September 2015)</li>							
				<li>1.0.3 (3 Oktober 2015)</li>							
				<li>1.0.4 (21 Oktober 2015)</li>
			</ul>
		</div>
	<div class="clearfix"></div>
</div>