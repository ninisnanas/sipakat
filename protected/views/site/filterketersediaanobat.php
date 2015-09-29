<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buat Obat';
$this->breadcrumbs=array(
  '',
);
?>

      <div>
        <h1>Formulir </h1>
        <form>
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row">
              <label for="satuan" class="required">Nama Obat</label>
              <select name="satuan" class="" data-placeholder="Select satuan ...">
                <option>Paracetamol</option>
              </select>
            </div>
            <div class="form-row">
              <label for="satuan" class="required">Sumber Dana</label>
              <select name="satuan" class="" data-placeholder="Select satuan ...">
                <option>Semua</option>
                <option>Askes</option>
                <option>APBD I</option>
                <option>APBD II</option>
              </select>
            </div>
            <div class="form-row">
              <label for="kelompokobat" class="required">Provinsi</label>
              <select name="kelompokobat" class="" data-placeholder="Select kelompokobat ...">
                <option>Semua</option>
                <option>DKI Jakarta</option>
                <option>Jawa Barat</option>
                <option>Banten</option>
              </select>
            </div>
            <div class="form-row">
              <label for="kelompokobat" class="required">Kabupaten</label>
              <select name="kelompokobat" class="" data-placeholder="Select kelompokobat ...">
                <option>Semua</option>
                <option>Jakarta Pusat</option>
                <option>Jakarta Utara</option>
                <option>Jakarta Timur</option>
              </select>
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Tampilkan</button>
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->
