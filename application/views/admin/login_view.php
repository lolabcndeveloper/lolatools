<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="viewport" content="user-scalable=no" />
    
    <title>SEAT Ibiza 30 Years</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/reset.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/formalize.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/checkboxes.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/sourcerer.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/jqueryui.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/tipsy.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/calendar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/tags.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/fonts.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>media/admin/css/main.css" />
    <link rel="stylesheet" media="all and (orientation:portrait)" href="<?php echo base_url(); ?>media/admin/css/portrait.css" />
	
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>apple-touch-icon-precomposed.png" />
    <link rel="shortcut icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
    
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body id="login">

	<div id="login_container">
	
		<div id="login_logo">
			<img src="<?php echo base_url(); ?>media/admin/img/logo30.png" alt="IBIZA 30 Years"/>
		</div>
		
		<div id="login_errors">
			<?php echo validation_errors(); ?>
		</div>
		
	  	<div id="login_form">
		
			<form accept-charset="utf-8" method="post" action="<?php echo base_url(); ?>admin/verifylogin">
			  <label for="email">Email:</label><input type="text" id="email" name="email" placeholder="Email" class="{validate: {required: true}}" /><br/>
			  <label for="password">Password:</label><input type="password" id="password" name="password" placeholder="Password" class="{validate: {required: true}}" /><br/>
			  <button type="submit" class="button blue"><span class="glyph key"></span> Login</button>
			</form>
	  	</div>
	</div>
    
    <!-- JavaScript -->
    <!--
    <script src="<?php echo base_url(); ?>media/admin/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>media/admin/js/jqueryui.min.js"></script>
    <script src="<?php echo base_url(); ?>media/admin/js/jquery.cookies.js"></script>
    <script src="<?php echo base_url(); ?>media/admin/js/jquery.pjax.js"></script>
    <script src="<?php echo base_url(); ?>media/admin/js/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>media/admin/js/application.js"></script>
    -->

</body>
</html>