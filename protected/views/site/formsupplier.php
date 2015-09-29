<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buat Supplier';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Formulir Pembuatan Supplier</h1>
        <form>
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row">
              <label for="kode" class="required">Kode Supplier</label>
              <input class="long" type="text" name="kode"  id="kode" value=""/>
            </div>
            <div class="form-row">
              <label for="nama" class="required">Nama Supplier</label>
              <input class="long" type="text" name="nama"  id="nama" value=""/>
            </div>
            <div class="form-row">
              <label for="alamat" class="required">Alamat Supplier</label>
              <textarea class="long" name="alamat" id="alamat"></textarea>
            </div>
            <div class="form-row">
              <label for="telepon" class="required">Nomor Telepon</label>
              <input class="long" type="text" name="telepon"  id="telepon" value=""/>
            </div>
            <div class="form-row">
              
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Buat Supplier</button>
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->
