<!--home-->
<div class="leftColum">

 	<?php //include( 'search.php' ); ?>

    <!--search-->
    <h2>Search</h2>
    <form action="#" id="search" name="search" method="post" class="formStyle">



    	<select id="clientSearch" name="client" tabindex="1">
        	<option value="">Client</option>
			<?php
			foreach ($clients as $client) {
				//echo '<option value="'.$client->id.'">'.$client->name.'</option>';
				echo '<option value="'.$client->client.'">'.$client->client.'</option>';
			}
			?>
      	</select>
      
      	<select id="mediaSearch" name="media" tabindex="2">
        	<option value="">Media</option>
			<?php
			foreach ($medias as $media) {
				//echo '<option value="'.$media->id.'">'.$media->name.'</option>';
				echo '<option value="'.$media->media.'">'.$media->media.'</option>';
			}
			?>
      	</select>
      
      	<input type="text" id="keywordsSearch" placeholder="Keyword" />
      
      	<div class="calendars">
        
        	<div class="lineCalendars">
          		<label>
            		<p>From</p>
            		<input id="form1" class="dateStyle" type="text" placeholder="XX/XX/XX" />
          		</label>
          
          		<label>
            		<p class="secondInput">To</p>
            		<input id="to1" class="dateStyle" type="text" placeholder="XX/XX/XX" />
          		</label>
        	</div><!--lineCalendars-->
    
		</div><!--calendars-->
   
      	<span class="button search">SEARCH</span>
      
	</form>
    <!--search-->
 
 
 
 	<?php //include( 'createMini.php' ); ?>
    <!--createMini-->
    <h2>New Project</h2>
    <form action="#" id="createMini" name="createMini" method="post" class="formStyle">
     
    	<select id="clientCreate" name="client" tabindex="1">
        	<option value="">Client</option>
			<?php
			foreach ($clients as $client) {
				//echo '<option value="'.$client->id.'">'.$client->name.'</option>';
				echo '<option value="'.$client->client.'">'.$client->client.'</option>';
			}
			?>
      	</select>
      
      	<select id="mediaCreate" name="media" tabindex="2">
        	<option value="">Media</option>
			<?php
			foreach ($medias as $media) {
				//echo '<option value="'.$media->id.'">'.$media->name.'</option>';
				echo '<option value="'.$media->media.'">'.$media->media.'</option>';
			}
			?>
      	</select>
      
      	<input type="text" id="nameCreate" name="name" placeholder="Project name" />
      
      	<span class="button createMini">Create</span>
      
    </form>
    <!--createMini-->
        
</div>

<div class="rightColum">
	<h2>Rights near to expire</h2>
  	<?php //include( 'listProjects.php' ); ?>

</div>
<!--home-->