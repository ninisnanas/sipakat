<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Unggah';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Unggah Laporan</h1>
        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/reviewunggahukp4" method="post">
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row hide">
              <label for="provinsi" class="required">Provinsi</label>
              <select name="provinsi" class="" data-placeholder="Select Provinsi ...">
                <option value="">-- Pilih Provinsi --</option>
                <option>DKI Jakarta</option>
                <option>Banten</option>
                <option>Jawa Barat</option>
              </select>
            </div>
            <div class="form-row hide">
              <label for="Kabupaten" class="required">Kabupaten/Kota</label>
              <select name="Kabupaten" class="" data-placeholder="Select Kabupaten ...">
                <option value="">-- Pilih Kab./Kota --</option>
                <option>Jakarta Pusat</option>
                <option>Jakarta Utara</option>
                <option>Jakarta Timur</option>
                <option>Jakarta Selatan</option>
                <option>Jakarta Barat</option>
              </select>
            </div>
            <div class="form-row hide">
              <label for="puskesmas" class="required">Puskesmas</label>
              <select name="puskesmas" class="" data-placeholder="Select Puskesmas ...">
                <option value="">-- Pilih Puskesmas --</option>
                <option value="Tanah Abang">Tanah Abang</option>
                <option value="Menteng">Menteng</option>
                <option value="Senen">Senen</option>
                <option value="Cempaka Putih">Cempaka Putih</option>
                <option value="Johar Baru">Johar Baru</option>
              </select>
            </div>
            <div class="form-row hide">
              <label for="bulan" class="required">Bulan</label>
              <select name="bulan" class="" data-placeholder="Select Bulan ...">
                <option value="">-- Pilih Bulan --</option>
                <option value="Januari">Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
              </select>
            </div>
            <div class="form-row hide">
              <label for="tahun" class="required">Tahun</label>
              <select name="tahun" class="" data-placeholder="Select Tahun ...">
                <option value="">-- Pilih Tahun --</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
              </select>
            </div>
            <div class="form-row">
              <label for="periode" class="required">Periode</label>
              <select name="periode" class="" data-placeholder="Select Periode ...">
                <option value="">-- Pilih Periode --</option>
                <option value="B0">B0</option>
                <option value="B3">B3</option>
                <option value="B6">B6</option>
                <option value="B9">B9</option>
                <option value="B12">B12</option>
              </select>
            </div>
            <div class="form-row">
              <label for="keterangan" class="required">Keterangan</label>
              <textarea name="keterangan" class="" data-placeholder="Select Keterangan ..."></textarea>
            </div>
            <div class="form-row">
              <label for="file" class="required">Pilih File</label>
              <input class="long" type="file" name="file"  id="file" value=""/>
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Unggah Laporan</button>
            </div>
            <div class="form-row">
              
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->
      
