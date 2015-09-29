<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buat provinsi';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Formulir Pembuatan Provinsi</h1>
        <form>
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row">
              <label for="kodeprovinsi" class="required">Kode Provinsi</label>
              <input class="long" type="text" name="kodeprovinsi"  id="kodeprovinsi" value=""/>
            </div>
            <div class="form-row">
              <label for="namaprovinsi" class="required">Nama Provinsi</label>
              <input class="long" type="text" name="namaprovinsi"  id="namaprovinsi" value=""/>
            </div>
            <div class="form-row">
              <label for="alamat" class="required">Alamat Dinas <br/>Kesehatan</label>
              <textarea class="long" name="alamat" id="alamat"></textarea>
            </div>
            <div class="form-row">
              <label for="telepon1" class="required">Nomor Telepon</label>
              <input class="long" type="text" name="telepon1"  id="telepon1" value=""/>
            </div>
            <div class="form-row">
              <label for="telepon2">Nomor Telepon</label>
              <input class="long" type="text" name="telepon2"  id="telepon2" value=""/>
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Buat Provinsi</button>
            </div>
            <div class="form-row">
              
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->
      
