<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

	$temp_defaults = get_option('reflex_gallery_options');
	
	$galleryAdded = false;
	$galleryName = '';
	$galleryDescription = '';	  
	$slug = '';
	$thumbwidth = $temp_defaults[1]['thumbnail_width'];
	$thumbheight = $temp_defaults[1]['thumbnail_height'];
	
	if(isset($_POST['add_gallery']))
	{
		if($_POST['galleryName'] != "") {
		  if(check_admin_referer('reflex_gallery','reflex_gallery')) {
			$galleryName = esc_sql($_POST['galleryName']);
			$galleryDescription = esc_sql($_POST['galleryDescription']);	  
			$slug = strtolower(str_replace(" ", "", $galleryName));
			$thumbwidth = intval($_POST['gallerythumbwidth']);
			$thumbheight = intval($_POST['gallerythumbheight']);		  
			
			$galleryAdded = $this->reflexdb->addGallery($galleryName, $slug, $galleryDescription, $thumbwidth, $thumbheight);
			
			if($galleryAdded) {
			?>  
			<div class="updated"><p><strong><?php _e('Gallery Added.', 'reflex-gallery' ); ?></strong></p></div>  
			<?php
			}
		  }
		  else {
			  ?>  
			<div class="updated"><p><strong><?php _e('Please enter a gallery name.', 'reflex-gallery' ); ?></strong></p></div>  
			<?php
		  }
		}
	}
?>
<div class='wrap'>
<h2>ReFlex Gallery - <?php _e('Add Gallery', 'reflex-gallery'); ?></h2>
<?php
	if($galleryAdded) {
	?>
    <div class="updated"><p><?php _e('Copy and paste this code into the page or post that you would like to display the gallery.', 'reflex-gallery'); ?></p>
    <p><input type="text" name="galleryCode" value="[ReflexGallery id='<?php _e($this->reflexdb->getNewGalleryId()); ?>']" size="40" /></p></div>
    <?php }
	else {
	?>
    <p><?php _e('This is where you can create new galleries. Once the new gallery has been added, a short code will be provided for use in posts.', 'reflex-gallery'); ?></p>
    <?php } ?>
	
    <form name="add_gallery_form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
    <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
    <input type="hidden" name="add_gallery" value="true" />
    <table class="widefat post fixed" cellspacing="0">
    	<thead>
        <tr>
        	<th width="250"><?php _e('Attribute', 'reflex-gallery'); ?></th>
            <th><?php _e('Value', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        	<th><?php _e('Attribute', 'reflex-gallery'); ?></th>
            <th><?php _e('Value', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
        </tr>
        </tfoot>
        <tbody>
        	<tr>
            	<td><strong><?php _e('Enter Gallery Name', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="30" name="galleryName" value="<?php _e($galleryName); ?>" /></td>
                <td><?php _e('This name is the internal name for the gallery.<br />Please avoid non-letter characters such as', 'reflex-gallery'); ?> ', ", *, etc.</td>
            </tr>
            <tr>
            	<td><strong><?php _e('Enter Gallery Description', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="50" name="galleryDescription" value="<?php _e($galleryDescription); ?>" /></td>
                <td><?php _e('This description is for internal use.', 'reflex-gallery'); ?></td>
            </tr>            
            <tr>
            	<td><strong><?php _e('Enter Thumbnail Width', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="10" name="gallerythumbwidth" value="<?php _e($thumbwidth); ?>" /></td>
                <td><?php _e('This is the width of the gallery thumbnail image.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td><strong><?php _e('Enter Thumbnail Height', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="10" name="gallerythumbheight" value="<?php _e($thumbheight); ?>" /></td>
                <td><?php _e('This is the height of the gallery thumbnail image.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td class="major-publishing-actions"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Add Gallery', 'reflex-gallery'); ?>" /></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
	</table>
    </form>
    <br /><br />
     <table class="widefat post fixed">
    	<thead>
        <tr>
        	<th><em><?php _e('Please consider making a donation for the continued development of this plugin. Thanks.', 'reflex-gallery'); ?></em></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        	<th></th>
        </tr>
        </tfoot>
        <tbody>        				
            <tr>
            <td><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&amp;hosted_button_id=BD7VZR88K9DB4" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" alt="PayPal - The safer, easier way to pay online!"><img alt="" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"></a></td>            
            </tr>
            </tbody>
            </table>
            <br /><br />
     <table class="widefat post fixed">
    	<thead>
        <tr>
        	<th><em>Other plugins by <a href="http://labs.hahncreativegroup.com/" target="_blank">HahnCreativeGroup</a></em></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        	<th></th>
        </tr>
        </tfoot>
        <tbody>        				
            <tr>
            <td>
            	<ul>
                	<li><a href="http://wordpress-photo-gallery.com/?src=rg" target="_blank">ReFlex Gallery Pro</li>
                    <li><a href="http://labs.hahncreativegroup.com/wordpress-plugins/wp-easy-gallery-pro-simple-wordpress-gallery-plugin/?src=rg" target="_blank">WP Easy Gallery Pro</a></li>
                    <li><a href="http://wordpress.org/extend/plugins/custom-post-donations/" target="_blank">Custom Post Donations</a></li>
                    <li><a href="http://wordpress.org/extend/plugins/wp-translate/" target="_blank">WP Translate</a></li>
                </ul>
            </td>            
            </tr>
            </tbody>
            </table>
</div>