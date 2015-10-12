
  
  
    <!-- JavaScript -->
	<!--
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/jqueryui.min.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/jquery.cookies.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/jquery.pjax.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/jquery.metadata.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/jquery.validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/grocery_crud/js/jquery_plugins/jquery.fancybox.js"></script>
  
    <script src="<?php echo base_url(); ?>media/js/admin/jquery.tipsy.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/jquery.livequery.js"></script>
    <script src="<?php echo base_url(); ?>media/js/admin/application.js"></script>
	-->

    <?php if (isset($output)): ?>
        <?php foreach($output->js_files as $file): ?>
          <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
   <?php endif ?>
  </body>
</html>