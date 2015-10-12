<div id="primary">

	<ul>

	<?php //if ($activa == "installation") { ?>
	
		<!--
		<li class="active">
			<a href="<?php echo base_url(); ?>index.php?/admin/">
				<span class="glyph gear"></span>
				Installation
		  	</a>
		</li>
		-->
		

	<?php //} else { ?>

	
		<li <?php if ($activa == "home"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin">
			<span class="glyph home"></span>
			Home
		  </a>
		</li>
		
		<li class="separacion"></li>
		
		<li <?php if ($activa == "weeks"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/weeks">
			<span class="glyph listicon"></span>
			Weeks
		  </a>
		</li>
		
		<li <?php if ($activa == "days"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/days">
			<span class="glyph listicon"></span>
			Days
		  </a>
		</li>
		
		
		<li class="separacion"></li>
		
		<li <?php if ($activa == "posts"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/posts">
			<span class="glyph listicon"></span>
			Facebook Posts
		  </a>
		</li>
		
		
		<li <?php if ($activa == "posts_tab"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/posts_tab">
			<span class="glyph listicon"></span>
			Tab Content Posts
		  </a>
		</li>
		
		
		
		<li class="separacion"></li>
		
		<li <?php if ($activa == "rankings"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/rankings">
			<span class="glyph listicon"></span>
			Rankings
		  </a>
		</li>
        
        <li <?php if ($activa == "users"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/users">
			<span class="glyph listicon"></span>
			Users
		  </a>
		</li>
        
        <li <?php if ($activa == "winners"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/winners">
			<span class="glyph listicon"></span>
			Winners
		  </a>
		</li>
		
		<li class="separacion"></li>
		
        <!--
		<li <?php if ($activa == "translations"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/translations">
			<span class="glyph listicon"></span>
			Translations
		  </a>
		</li>
		-->
        
		<li <?php if ($activa == "configs"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/configs">
			<span class="glyph listicon"></span>
			Config
		  </a>
		</li>
		
        
		<li <?php if ($activa == "installation"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/installation">
			<span class="glyph listicon"></span>
			Installation
		  </a>
		</li>
		
		
		<li class="separacion"></li>
		
		
		<li <?php if ($activa == "admins"): ?>class="active"<?php endif?>>
		  <a href="<?php echo base_url(); ?>admin/admins">
			<span class="glyph listicon"></span>
			Admins
		  </a>
		</li>
		

		
		<li class="separacion"></li>
		
	<?php //} ?>
	
	
		<!--<li class="bottom">-->
		<li>
		  <a href="<?php echo base_url(); ?>admin/login/logout">
			<span class="glyph quit"></span>
			Salir
		  </a>
		</li>
		
		<li class="separacion"></li>
		
	  </ul>
	  
	  
</div>