<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

//Add image
if(isset($_POST['upload_image'])) {
	if (!isset($_POST['switch']) && !isset($_POST['delete_image']) && !isset($_POST['edit_image'])) {
	  if(check_admin_referer('reflex_gallery','reflex_gallery')) {
		$gid = intval($_POST['galleryId']);
		$imagePath = esc_sql($_POST['upload_image']);
		$imageTitle = esc_sql($_POST['image_title']);
		$imageDescription = esc_sql($_POST['image_description']);
		$sortOrder = intval($_POST['image_sortOrder']);
		$imageAdded = $this->reflexdb->addFullImage($gid, $imagePath, $imageTitle, $imageDescription, $sortOrder);
		
		var_dump($imagePath);
		if($imageAdded) {
		?>
			<div class="updated"><p><strong><?php _e('Image saved.'); ?></strong></p></div>  
		<?php }
	 }
	}
}

//Edit image
if(isset($_POST['edit_image'])) {	
	if(check_admin_referer('reflex_gallery','reflex_gallery')) {
	  $ids = $_POST['edit_image'];
	  $images = $_POST['edit_imagePath'];
	  $imageTitles = $_POST['edit_imageTitle'];
	  $imageDescriptions = $_POST['edit_imageDescription'];
	  $sortOrders = $_POST['edit_imageSort'];
	  $imagesToDelete = isset($_POST['edit_imageDelete']) ? $_POST['edit_imageDelete'] : array();
	  
	  $i = 0;
	  foreach($ids as $editImageId) {
			if(in_array($editImageId, $imagesToDelete)) {
				$this->reflexdb->deleteImage(intval($editImageId));
			}
			else {
				$imageEdited = $this->reflexdb->editImage(intval($editImageId), esc_sql($images[$i]), esc_sql($imageTitles[$i]), esc_sql($imageDescriptions[$i]), intval($sortOrders[$i]));
			}		
			$i++;
		}
		  
	  ?>  
	  <div class="updated"><p><strong><?php _e('Image has been edited.', 'reflex-gallery'); ?></strong></p></div>  
	  <?php
	}
}

// Delete image
if(isset($_POST['delete_image'])) {	
	if(check_admin_referer('reflex_gallery','reflex_gallery')) {
	  $imageId = intval($_POST['delete_image']);
	  $this->reflexdb->deleteImage($imageId);
	  $galleryId = intval($_POST['galleryId']);
	  $imageResults = $this->reflexdb->getImagesByGalleryId($galleryId);
		  
	  ?>  
	  <div class="updated"><p><strong><?php _e('Image has been deleted.', 'reflex-gallery'); ?></strong></p></div>  
	  <?php
	}
}

//Load/Reload images
if(isset($_POST['galleryId'])) {
	if(check_admin_referer('reflex_gallery','reflex_gallery')) {
	  $galleryId = intval($_POST['galleryId']);
	  $imageResults = $this->reflexdb->getImagesByGalleryId($galleryId);
	  $gallery = $this->reflexdb->getGalleryById($galleryId);
	}
}
?>
<div class='wrap'>
<h2>ReFlex Gallery - <?php _e('Add Images', 'reflex-gallery'); ?></h2>
<?php if(!isset($_POST['galleryId'])) {
	
$galleryResults = $this->reflexdb->getGalleries();

?>
<p><?php _e('Select a gallery to add or edit its images', 'reflex-gallery'); ?></p>
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
<?php } else { ?>
    <form name="add_image_form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
    <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
    <input type="hidden" name="galleryId" value="<?php _e($gallery->Id); ?>" />
    <table class="widefat post fixed" cellspacing="0">
    	<thead>
        <tr>
            <th width="340"><?php _e('Image Path', 'reflex-gallery'); ?></th>
            <th width="150"><?php _e('Image Title', 'reflex-gallery'); ?></th>
            <th><?php _e('Image Description', 'reflex-gallery'); ?></th>
            <th width="90"><?php _e('Sort Order', 'reflex-gallery'); ?></th>
            <th width="115"></th>
        </tr>
        </thead>        
        <tbody>
        	<tr>
            	<td><input id="upload_image" type="text" size="36" name="upload_image" value="" />
					<input id="upload_image_button" type="button" value="Upload Image" /> <input type="submit" name="Submit" class="button-primary" value="Save Image" /></td>
                <td><input type="text" name="image_title" size="20" value="" /></td>
                <td><input type="text" name="image_description" size="45" value="" /></td>
                <td><input type="text" name="image_sortOrder" size="10" value="" /></td>
                <td class="major-publishing-actions"></td>
            </tr>        	
        </tbody>
     </table>
     </form>
    <hr />    
    <?php
		if(count($imageResults) > 0) {
		?>
        	<?php $GalleryId = $_POST['galleryId']; ?>
            <h3><?php _e('Gallery Images', 'reflex-gallery'); ?>: <?php _e($gallery->name); ?></h3>
            <form name="switch_gallery" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
            <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
            <input type="hidden" name="switch" value="true" />
            <p><input type="submit" name="Submit" class="button-primary" value="<?php _e('Switch Gallery', 'reflex-gallery'); ?>" /></p>
            </form>
            <p><?php _e('Edit existing images in this gallery', 'reflex-gallery'); ?></p>
    <table class="widefat post fixed" id="imageResults" cellspacing="0">
    	<thead>
        <tr>
        	<th width="105"><?php _e('Image Preview', 'reflex-gallery'); ?></th>
            <th><?php _e('Image Info', 'reflex-gallery'); ?></th>
            <th width="230"><strong><em><a href="http://wordpress-photo-gallery.com/reflex-gallery-premium/" target="_blank">Try ReFlex Gallery Premium</a></em></strong></th>
            
        </tr>
        </thead>        
        <tbody> 
			<form name="edit_image_form" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
            <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
            <input type="hidden" name="galleryId" value="<?php _e($GalleryId); ?>" />
        	<?php foreach($imageResults as $image) { ?>				
            <tr>
            	<td><a onclick="var images=['<?php _e($image->imagePath); ?>']; var titles=['<?php _e($image->title); ?>']; var descriptions=['<?php _e($image->description); ?>']; jQuery.prettyPhoto.open(images,titles,descriptions);" style="cursor: pointer;"><img src="<?php _e($image->imagePath); ?>" width="75" border="0" /></a><br /><i><?php _e('Click to preview', 'reflex-gallery'); ?></i></td>
                <td>
                	
                	<input type="hidden" name="edit_image[]" value="<?php _e($image->Id); ?>" />                    
                	<p><strong><?php _e('Image Path', 'reflex-gallery'); ?>:</strong> <input type="text" name="edit_imagePath[]" size="75" value="<?php _e($image->imagePath); ?>" /></p>
                    <p><strong><?php _e('Image Title', 'reflex-gallery'); ?>:</strong> <input type="text" name="edit_imageTitle[]" size="20" value="<?php _e($image->title); ?>" /></p>
                    <p><strong><?php _e('Image Description', 'reflex-gallery'); ?>:</strong> <input type="text" name="edit_imageDescription[]" size="75" value="<?php _e($image->description); ?>" /></p>
                    <p><strong><?php _e('Sort Order', 'reflex-gallery'); ?>:</strong> <input type="text" name="edit_imageSort[]" size="10" value="<?php _e($image->sortOrder); ?>" /></p>
					<p><strong><?php _e('Delete Image?', 'reflex-gallery'); ?></strong> <input type="checkbox" name="edit_imageDelete[]" value="<?php echo $image->Id; ?>" /></p>
                </td>
                <td class="major-publishing-actions">
                </td>
            </tr>
			<?php } ?>
        </tbody>
     </table>
		<p class="major-publishing-actions"><input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes', 'reflex-gallery'); ?>" /></p>
        </form>
        <?php	
		}
	?>
<script src="<?php echo WP_PLUGIN_URL; ?>/reflex-gallery/scripts/prettyphoto/jquery.prettyPhoto.js" type="text/javascript"></script>
<script src="<?php echo WP_PLUGIN_URL; ?>/reflex-gallery/scripts/prettyphoto/ReflexGalleryLoader.js" type="text/javascript"></script>     
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
                    <li><a href="http://labs.hahncreativegroup.com/wordpress-plugins/wp-easy-gallery-pro-simple-wordpress-gallery-plugin/?src=rg" target="_blank">WP Easy Gallery Pro</a></li>
                    <li><a href="http://wordpress.org/extend/plugins/custom-post-donations/" target="_blank">Custom Post Donations</a></li>
                    <li><a href="http://wordpress.org/extend/plugins/wp-translate/" target="_blank">WP Translate</a></li>
                </ul>
            </td>            
            </tr>
            </tbody>
            </table>
            </div>