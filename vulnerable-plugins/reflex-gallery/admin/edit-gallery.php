<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

//Select gallery
if(isset($_POST['select_gallery']) || isset($_POST['galleryId'])) {
	if(check_admin_referer('reflex_gallery','reflex_gallery')) {
	  $gid = (isset($_POST['select_gallery'])) ? intval(esc_sql($_POST['select_gallery'])) : intval(esc_sql($_POST['galleryId']));	
	  
	  $imageResults = $this->reflexdb->getImagesByGalleryId($gid);
	  $gallery = $this->reflexdb->getGalleryById($gid);
	}
}
	
if(isset($_POST['easy_gallery_edit']))
{
	if($_POST['galleryName'] != "") {
	  if(check_admin_referer('reflex_gallery','reflex_gallery')) {
		$editId = intval($_POST['easy_gallery_edit']);
		$galleryName = esc_sql($_POST['galleryName']);
		$galleryDescription = esc_sql($_POST['galleryDescription']);	  
		$slug = strtolower(str_replace(" ", "", $galleryName));
		$thumbwidth = intval($_POST['gallerythumbwidth']);
		$thumbheight = intval($_POST['gallerythumbheight']);
		
		if(isset($_POST['easy_gallery_edit'])) {		  
			$galleryEdited = $this->reflexdb->editGallery($editId, $galleryName, $slug, $galleryDescription, $thumbwidth, $thumbheight);
			?>  
			<div class="updated"><p><strong><?php _e('Gallery has been edited.', 'reflex-gallery' ); ?></strong></p></div>  
			<?php
		}
	  }
	}
}

$galleryResults = $this->reflexdb->getGalleries();

?>
<div class='wrap'>
<h2>ReFlex Gallery - <?php _e('Edit Galleries', 'reflex-gallery'); ?></h2>
<?php if(!isset($_POST['select_gallery']) && !isset($_POST['galleryId'])) { ?>
    <p><?php _e('Select a gallery to edit its properties', 'reflex-gallery'); ?></p>		
    <table class="widefat post fixed" id="galleryResults" cellspacing="0">
	<thead>
    	<tr>
          <th><?php _e('Gallery Name', 'reflex-gallery'); ?></th>
          <th><?php _e('Description', 'reflex-gallery'); ?></th>
          <th></th>
          <th></th>
        </tr>
    </thead>
    <tfoot>
    	<tr>
          <th><?php _e('Gallery Name', 'reflex-gallery'); ?></th>
          <th><?php _e('Description', 'reflex-gallery'); ?></th>
          <th></th>
          <th></th>
        </tr>
    </tfoot>
    <tbody>
    	<?php
			foreach($galleryResults as $gallery) {
				?>
                <tr>
                	<td><?php _e($gallery->name); ?></td>
                    <td><?php _e($gallery->description); ?></td>
                    <td></td>
                    <td>
                    	<form name="select_gallery_form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
                    	<?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
                        <input type="hidden" name="galleryId" value="<?php _e($gallery->Id); ?>" />
                        <input type="hidden" name="galleryName" value="<?php _e($gallery->name); ?>" />
                        <input type="submit" name="Submit" class="button-primary" value="<?php _e('Select Gallery', 'reflex-gallery'); ?>" />
                		</form>
                    </td>
                </tr>
		<?php } ?>
        <tr>
        </tr>
    </tbody>
</table>
    
    <?php } else if(isset($_POST['select_gallery']) || isset($_POST['galleryId'])) { ?>    
    <h3>Gallery: <?php _e($gallery->name); ?></h3>
    <form name="switch_gallery" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
    <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
    <input type="hidden" name="switch" value="true" />
    <p><input type="submit" name="Submit" class="button-primary" value="<?php _e('Switch Gallery', 'reflex-gallery'); ?>" /></p>
    </form>
	
    <p><?php _e('Click "Save Changes" after making changes', 'reflex-gallery'); ?></p>
    
    <form name="edit_gallery_form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
    <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
    <input type="hidden" name="easy_gallery_edit" value="<?php _e($gid); ?>" />
    <table class="widefat post fixed" cellspacing="0">
    	<thead>
        <tr>
        	<th width="250"><?php _e('Attribute Name', 'reflex-gallery'); ?></th>
            <th><?php _e('Value', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        	<th><?php _e('Attribute Name', 'reflex-gallery'); ?></th>
            <th><?php _e('Value', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
        </tr>
        </tfoot>
        <tbody>
        	<tr>
            	<td><strong><?php _e('Enter Gallery Name', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="30" name="galleryName" value="<?php _e($gallery->name); ?>" /></td>
                <td><?php _e('This name is the internal name for the gallery.', 'reflex-gallery'); ?><br /><?php _e('Please avoid non-letter characters such as', 'reflex-gallery'); ?> ', ", *, etc.</td>
            </tr>
            <tr>
            	<td><strong><?php _e('Enter Gallery Description', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="50" name="galleryDescription" value="<?php _e($gallery->description); ?>" /></td>
                <td><?php _e('This description is for internal use.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td><strong><?php _e('Enter Thumbnail Width', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="10" name="gallerythumbwidth" value="<?php echo ($gallery->thumbwidth == 0) ? "auto" : $gallery->thumbwidth; ?>" /></td>
                <td><?php _e('This is the width of the gallery thumbnail image.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td><strong><?php _e('Enter Thumbnail Height', 'reflex-gallery'); ?>:</strong></td>
                <td><input type="text" size="10" name="gallerythumbheight" value="<?php echo ($gallery->thumbheight == 0) ? "auto" : $gallery->thumbheight; ?>" /></td>
                <td><?php _e('This is the height of the gallery thumbnail image.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td class="major-publishing-actions"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'reflex-gallery'); ?>" /></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
	</table>
    </form>
    <?php } ?> 
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
                    <li><a href="http://labs.hahncreativegroup.com/wordpress-plugins/wp-easy-gallery-pro-simple-wordpress-gallery-plugin/?src=grrg" target="_blank">WP Easy Gallery Pro</a></li>
                    <li><a href="http://wordpress.org/extend/plugins/custom-post-donations/" target="_blank">Custom Post Donations</a></li>
                    <li><a href="http://wordpress.org/extend/plugins/wp-translate/" target="_blank">WP Translate</a></li>
                </ul>
            </td>            
            </tr>
            </tbody>
            </table>   
</div>