<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

if(isset($_POST['galleryId'])) {
	if(check_admin_referer('reflex_gallery','reflex_gallery')) {
	  $this->reflexdb->deleteGallery(intval($_POST['galleryId']));
		  
	  ?>  
	  <div class="updated"><p><strong><?php _e('Gallery has been deleted.', 'reflex-gallery'); ?></strong></p></div>  
	  <?php	
	}
}

$galleryResults = $this->reflexdb->getGalleries();

if (isset($_POST['defaultSettings'])) {
	if(check_admin_referer('reflex_gallery','reflex_gallery')) {
	  $temp_defaults = get_option('reflex_gallery_options');
	  $temp_defaults[1]['thumbnail_width'] = $_POST['default_width'];
	  $temp_defaults[1]['thumbnail_height'] = $_POST['default_height'];
	  $temp_defaults[1]['style'] = $_POST['style'];
	  $temp_defaults[1]['hide_overlay'] = isset($_POST['hide_overlay']) ? $_POST['hide_overlay'] : 'false';
	  $temp_defaults[1]['hide_social'] = isset($_POST['hide_social']) ? $_POST['hide_social'] : 'false';
	  $temp_defaults[1]['custom_style'] = isset($_POST['custom_style']) ? $_POST['custom_style'] : '';
	  $temp_defaults[1]['thumbnail_dShadow'] = isset($_POST['thumbnail_dShadow']) ? $_POST['thumbnail_dShadow'] : 'false';	  
	  
	  update_option('reflex_gallery_options', $temp_defaults);
	  ?>  
	  <div class="updated"><p><strong><?php _e('Gallery options have been updated.', 'reflex-gallery'); ?></strong></p></div>  
	  <?php
	}
}
$default_options = get_option('reflex_gallery_options');
?>
<div class='wrap'>
<h2>ReFlex Gallery</h2>
<p><?php _e('This is a listing of all galleries', 'reflex-gallery'); ?></p>
    <table class="widefat post fixed" id="galleryResults" cellspacing="0">
    	<thead>
        <tr>
        	<th><?php _e('Gallery Name', 'reflex-gallery'); ?></th>
            <th><?php _e('Gallery Short Code', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
            <th width="136"></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        	<th><?php _e('Gallery Name', 'reflex-gallery'); ?></th>
            <th><?php _e('Gallery Short Code', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>
        	<?php foreach($galleryResults as $gallery) { ?>				
            <tr>
            	<td><?php _e($gallery->name); ?></td>
                <td><input type="text" size="40" value="[ReflexGallery id='<?php _e($gallery->Id); ?>']" /></td>
                <td><?php _e($gallery->description); ?></td>
                <td class="major-publishing-actions">
                <form name="delete_gallery_<?php _e($gallery->Id); ?>" method ="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
                	<?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
                	<input type="hidden" name="galleryId" value="<?php _e($gallery->Id); ?>" />
                    <input type="submit" name="Submit" class="button-primary" value="<?php _e('Delete Gallery', 'reflex-gallery'); ?>" />
                </form>
                </td>
            </tr>
			<?php } ?>
        </tbody>
     </table>
     <br />
     <h3><?php _e('Default Options', 'reflex-gallery'); ?></h3>
     <form name="save_default_settings" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
     <?php wp_nonce_field('reflex_gallery', 'reflex_gallery'); ?>
     <table class="widefat post fixed" cellspacing="0">
     	<thead>
        	<th><?php _e('Attribute', 'reflex-gallery'); ?></th>
            <th><?php _e('Default Value', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
        </thead>
        <tfoot>
        	<th><?php _e('Attribute', 'reflex-gallery'); ?></th>
            <th><?php _e('Default Value', 'reflex-gallery'); ?></th>
            <th><?php _e('Description', 'reflex-gallery'); ?></th>
        </tfoot>
        <tbody>
        	<tr>
            	<td><?php _e('Default Thumbnail Width', 'reflex-gallery'); ?></td>
                <td><input name="default_width" id="default_width" value="<?php _e($default_options[1]['thumbnail_width']); ?>" /> px</td>
                <td><?php _e('This is the default width (in pixels) of all of the gallery thumbnail images.<br />(This property can be overwritten when creating individual galleries.)', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td><?php _e('Default Thumbnail Height', 'reflex-gallery'); ?></td>
                <td><input name="default_height" id="default_height" value="<?php _e($default_options[1]['thumbnail_height']); ?>" /> px</td>
                <td><?php _e('This is the default height (in pixels) of all of the gallery thumbnail images.<br />(This property can be overwritten when creating individual galleries.)', 'reflex-gallery'); ?></td>
            </tr>
			<tr>
            	<td><?php _e('Thumbnail Style', 'reflex-gallery'); ?></td>
                <td>
					<select id="style" name="style">
						<option value="default"<?php _e(($default_options[1]['style'] == 'default') ? " selected" : ""); ?>>Default - Fade-in on hover</option>
						<option value="reverse"<?php _e(($default_options[1]['style'] == 'reverse') ? " selected" : ""); ?>>Reverse - Fade-out on hover</option>
					</select>
				</td>
                <td><?php _e('This is the style/skin of all of the gallery thumbnail images.', 'reflex-gallery'); ?></td>
            </tr>			
			<tr>
            	<td><?php _e('Thumbnail Dropshadow', 'reflex-gallery'); ?></td>
                <td><input type="checkbox" name="thumbnail_dShadow" id="thumbnail_dShadow"<?php _e(($default_options[1]['thumbnail_dShadow'] == 'true') ? "checked='checked'" : ""); ?> value="true" /></td>
                <td><?php _e('Use default thumbnail dropshadow (uncheck to disable dropshadow CSS).', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td><?php _e('Custom Thumbnail Style', 'reflex-gallery'); ?></td>
                <td><textarea name="custom_style" id="custom_style" rows="4" cols="50"><?php _e($default_options[1]['custom_style']); ?></textarea></td>
                <td><?php _e('This is where you would add custom styles for the gallery thumbnails.<br />(ex: border: solid 1px #cccccc; padding: 2px; margin-right: 10px;)', 'reflex-gallery'); ?></td>
            </tr>			
            <tr>
            	<td><?php _e('Hide Gallery Overlay', 'reflex-gallery'); ?></td>
                <td><input type="checkbox" name="hide_overlay" id="hide_overlay"<?php _e(($default_options[1]['hide_overlay'] == 'true') ? "checked='checked'" : ""); ?> value="true" /></td>
                <td><?php _e('Show or Hide thumbnail gallery overlay in modal window popup. Check to hide the overlay.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td><?php _e('Hide Social Sharing', 'reflex-gallery'); ?></td>
                <td><input type="checkbox" name="hide_social" id="hide_social"<?php _e(($default_options[1]['hide_social'] == 'true') ? "checked='checked'" : ""); ?> value="true" /></td>
                <td><?php _e('Show or Hide social sharing buttons in modal window popup. Check to hide Twitter and Facebook buttons.', 'reflex-gallery'); ?></td>
            </tr>
            <tr>
            	<td>                
                	<input type="hidden" name="defaultSettings" value="true" />
                    <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save', 'reflex-gallery'); ?>" />                
                </td>
                <td></td>
                <td>
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