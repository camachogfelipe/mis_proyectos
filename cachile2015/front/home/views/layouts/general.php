<!DOCTYPE>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js ie9">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title><?php echo SITENAME ?></title>
<link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>favicon.png" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=1024, maximum-scale=2">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<meta http-equiv="content-language" content="es" />
<meta http-equiv="pragma" content="No-Cache" />
<meta name="Keywords" lang="es" content="" />
<meta name="Description" lang="es" content="" />
<meta name="copyright" content="cogroupsas.com" />
<meta name="date" content="2013" />
<meta name="author" content="desarrollo web: cogroupsas.com" />
<meta name="robots" content="All" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.mCustomScrollbar.css") ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/font-awesome.min.css") ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css") ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap-theme.min.css") ?>" />
<link rel="stylesheet" href="<?php echo base_url("assets/css/mundial.css") ?>">
</head>
<body>
<div id="loader"><div id="progress"></div></div>  
<?php
if (isset($anonymous)) {
    echo $template['partials']['intro'];
}
?>       
<?php echo $template['partials']['header']; ?>
<?php echo $template['body']; ?>
<?php echo $template['partials']['footer']; ?>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.sticky.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery.easing.1.3.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/actions.js"); ?>"></script>
</body>
</html>