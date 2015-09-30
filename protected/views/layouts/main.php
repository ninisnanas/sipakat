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

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css "/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css "/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/business-casual.css "/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
  
  <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

<!--
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/home.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/table.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css"/>
-->
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="body-mask">
  <header>
    <div class="brand">SIPaKaT</div>
    <div class="address-bar">Control | Monitor | Evaluate</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">SIPaKaT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <?php echo CHtml::link('Beranda', array('Site/index'));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Tentang', array('Site/tentang'));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Personil', array('Personil/index'));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Kegiatan Personil', array('DetailKegiatanPersonil/index'));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Daftar Kegiatan', array('Kegiatan/index'));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Referensi', array('Referensi/index'));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Rangkuman', array('Rangkuman/index'));?>
                    </li>
                    <li>
                        <?php 
                        $id=Yii::app()->user->getId();
                        echo CHtml::link('Edit Password', array('Akun/update', 'id'=>$id));?>
                    </li>
                    <li>
                        <?php echo CHtml::link('Logout', array('Site/logout'));?>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
  </header>

  <div class="container">
    <div id="wrapper">
      <?php echo $content; ?>
    </div> <!-- WRAPPER END -->
  </div> <!-- CONTAINER END -->
  
  <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Bidang Algoritma 2015</p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
