<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php echo $current_lang; ?>"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="<?php echo $current_lang; ?>"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="<?php echo $current_lang; ?>"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!-->
<html itemscope itemtype="http://schema.org/Article" class="no-js" lang="<?php echo $current_lang; ?>">
<!--<![endif]-->
<head>
    <?php echo $metas; ?>  
    <?php echo $_styles; ?>
</head>
<body id="<?=$idBody?>" class="color5"> <!-- opciones: home, video, mecanica, tarjetas | con esto tambien marco la seccion activa en el menu-->
 
	<div id="wrapper">
  
  		<?php //include( './includes/header.php' ); ?>
        
        <?php if ($idBody != 'login')  
        	echo $header;
		?>
        
  
  		<div id="content" class="content">
    		<?php //include( './includes/'. $idBody .'.php' ); //home | searchResult | create  ?>
            <?php echo $content; ?>
  		</div><!--content-->
  
    	<?php //include( './includes/footerContent.php' ); ?>
        
        <?php //echo $footer; ?>
        
 	</div><!--wrapper-->
    

    
    <?php echo $analytics; ?>
    
    <?php echo $_scripts; ?>
  
</body>
</html>