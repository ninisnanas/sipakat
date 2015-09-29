<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buat Obat';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Formulir Pembuatan Obat</h1>
        <form>
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row">
              <label for="kodeobat" class="required">Kode Obat</label>
              <input class="long" type="text" name="kodeobat" id="kodeobat" value=""/>
            </div>
            <div class="form-row">
              <label for="namaobat" class="required">Nama Obat</label>
              <input class="long" type="text" name="namaobat" id="namaobat" value=""/>
            </div>
            <div class="form-row">
              <label for="satuan" class="required">Satuan</label>
              <select name="satuan" class="" data-placeholder="Select satuan ...">
                <option>Tablet</option>
                <option>Kapsul</option>
                <option>Ampul</option>
              </select>
            </div>
            <div class="form-row">
              <label for="buatsatuanbaru" class="required">Buat Satuan Baru</label>
              <input class="checkbox" type="checkbox" name="buatsatuanbaru" id="buatsatuanbaru" value=""/>
            </div>
            <div class="form-row">
              <label for="satuanbaru" class="required">Satuan Baru</label>
              <input class="long" type="text" name="satuanbaru" id="satuanbaru" value=""/>
            </div>
            <div class="form-row">
              <label for="kelompokobat" class="required">Kelompok Obat</label>
              <select name="kelompokobat" class="" data-placeholder="Select kelompokobat ...">
                <option>Paracetamol</option>
                <option>Paracetamol</option>
                <option>Paracetamol</option>
              </select>
            </div>
            <div class="form-row">
              <label for="buatkelompokbaru" class="required">Kelompok Satuan Baru</label>
              <input class="checkbox" type="checkbox" name="buatkelompokbaru" id="buatkelompokbaru" value=""/>
            </div>
            <div class="form-row">
              <label for="kelompokbaru" class="required">Kelompok Baru</label>
              <input class="long" type="text" name="kelompokbaru" id="kelompokbaru" value=""/>
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Buat Obat</button>
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->
