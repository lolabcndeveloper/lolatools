<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="width=1024px, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>SEAT - Ibiza 30 Years</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/reset.css" />
    <?php if (isset($output)): ?>
        <?php foreach($output->css_files as $file): ?>
          <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach($output->js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
    <?php endif ?>


    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/formalize.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/checkboxes.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/jqueryui.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/tipsy.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/tags.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/fonts.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/css/admin/main.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/grocery_crud/css/jquery_plugins/fancybox/jquery.fancybox.css" />
    
    <link rel="stylesheet" media="all and (orientation:portrait)" href="<?php echo base_url(); ?>media/css/admin/portrait.css" />
    <link rel="apple-touch-icon" href="./apple-touch-icon-precomposed.png" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />

    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>media/js/html5shiv.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

</head>
<body>

    <div id="header">
        header
    </div>
