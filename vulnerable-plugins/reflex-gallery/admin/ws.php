<?php header('Content-type: application/json'); ?>
<?php 
include_once('../../../../wp-config.php' );
$galleryResults = $wpdb->get_results( "SELECT Id, name FROM $wpdb->reflexGalleries" );
$count = 0;
?>{ "ReFlexGallery": [
<?php foreach($galleryResults as $gallery) { ?>
<?php $count++; ?>
{ "id": "<?php echo $gallery->Id; ?>", "name": "<?php echo $gallery->name; ?>"}<?php if ($count < count($galleryResults)) { echo ","; } ?>
<?php } ?>
]}