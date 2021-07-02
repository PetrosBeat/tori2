<!DOCTYPE html>
<html lang="es" xml:lang="es" >
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="es-ES">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="es-ES">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="es-ES">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]>
<html dir="ltr" lang="es-ES">
<![endif]-->
<head >
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="verport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Resusource Ltda">
<meta http-equiv="Content-Language" content="es-ES">
<!-- Metas -->
<meta name="description" content="INTRANET">
  <meta name="keywords" content="TORI SUSHI CONCEPCION">

<script>
var base_url = "<?php echo base_url();?>";
</script>



<style>
    html{
        font-family: 'Elegance';
    }
    span.select2-container {
    z-index:10050;
}

</style>
<!-- title -->
<title><?php echo $this->layout->getTitle(); ?></title>


<!-- CSS -->
<?php echo $this->layout->getCss(); ?>



<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5-els.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<script src="/js/sistema/template/index.js"></script>
<![endif]-->
<link href="/favicon.ico" rel="shortcut icon" />


</head>
<?php   if(isset($conectado)  ){  ?>
  <?=$header?>
<body class="top-navigation" style="color: black">

<div class="row wrapper border-bottom white-bg page-heading hidden-print">
                <div class="col-sm-4">
                    <h2></h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="Home">Home</a>
                        </li>
                        <li class="active">
                            <strong><a href="<?=$this->uri->segment(2);?>"><?=$sub_titulo ?></a> </strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">


                </div>
            </div>
<?php } ?>
            <div class="wrapper wrapper-content">
                <div class="row">
                   <?=$content_for_layout?>
                </div>
            </div>
<?php echo $this->layout->getJs(); ?>
      <script>
    var baseurl = "<?php print site_url();?>";

  </script>
</body>
</html>
