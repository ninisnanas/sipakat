<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Buat Akun';
$this->breadcrumbs=array(
	'',
);
?>

      <div>
        <h1>Formulir Pembuatan Akun</h1>
        <form>
          <fieldset>
            <legend>Nyam</legend>
            <div class="form-row">
              <span class="text red push170">* wajib diisi</span>
            </div>
            <div class="form-row">
              <label for="name" class="required">Nama</label>
              <input class="long" type="text" name="name" id="name" value=""/>
            </div>
            <div class="form-row">
              <label for="username" class="required">Username</label>
              <input class="long" type="text" name="username" id="username" value=""/>
            </div>
            <div class="form-row">
              <label for="password" class="required">Password</label>
              <input class="long" type="password" name="password" id="password" value=""/>
            </div>
            <div class="form-row">
              <label for="cpassword" class="required">Ulangi Password</label>
              <input class="long" type="password" name="password" id="cpassword" value=""/>
            </div>
            <div class="form-row">
              <label for="email" class="required">Email</label>
              <input class="long" type="text" name="email"  id="email" value=""/>
            </div>
            <div class="form-row">
              <label for="role" class="required">Role</label>
              <select name="role" class="" data-placeholder="Select Role ...">
                <option>Staff Pusat</option>
                <option>Staff Provinsi</option>
                <option>Staff Kabupaten</option>
              </select>
            </div>
            <div class="form-row">
              <label for="provinsi" class="required">Provinsi</label>
              <select name="provinsi" class="" data-placeholder="Select provinsi ...">
                <option>DKI Jakarta</option>
                <option>Banten</option>
                <option>Jawa Barat</option>
              </select>
            </div>
            <div class="form-row">
              <label for="Kabupaten" class="required">Kabupaten/Kota</label>
              <select name="Kabupaten" class="" data-placeholder="Select Kabupaten ...">
                <option>Jakarta Pusat</option>
                <option>Jakarta Utara</option>
                <option>Jakarta Timur</option>
                <option>Jakarta Selatan</option>
                <option>Jakarta Barat</option>
              </select>
            </div>
            <div class="form-row">
              <button class="btn push170 green" type="submit">Buat Akun</button>
            </div>
          </fieldset>
        </form>
      </div> <!-- FORM END -->