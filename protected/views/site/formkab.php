<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buat Kab./Kota';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Formulir Pembuatan Kabupaten/Kota</h1>
        <form>
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row">
              <label for="provinsi" class="required">Provinsi</label>
              <select name="provinsi" class="" data-placeholder="Select Provinsi ...">
                <option>DKI Jakarta</option>
                <option>Banten</option>
                <option>Jawa Barat</option>
              </select>
            </div>
            <div class="form-row">
              <label for="kodekabupaten" class="required">Kode Kabupaten</label>
              <input class="long" type="text" name="kodekabupaten"  id="kodekabupaten" value=""/>
            </div>
            <div class="form-row">
              <label for="namakabupaten" class="required">Nama Kabupaten</label>
              <input class="long" type="text" name="namakabupaten"  id="namakabupaten" value=""/>
            </div>
            <div class="form-row">
              <label for="alamat" class="required">Alamat <br/>Dinas Kesehatan</label>
              <textarea class="long" name="alamat" id="alamat"></textarea>
            </div>
            <div class="form-row">
              <label for="telepon1" class="required">Nomor Telepon</label>
              <input class="long" type="text" name="telepon1"  id="telepon1" value=""/>
            </div>
            <div class="form-row">
              <label for="telepon2">Nomor Telepon 2</label>
              <input class="long" type="text" name="telepon2"  id="telepon2" value=""/>
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Buat Kabupaten</button>
            </div>
            <div class="form-row">
              
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->
      
