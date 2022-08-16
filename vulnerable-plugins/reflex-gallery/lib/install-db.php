<?php
function install_db() {
  global $wpdb;			
  $flexi_gallery_db_version = '1.0';

  $reflexGalleries = $wpdb->reflexGalleries;
  $reflexImages = $wpdb->reflexImages;
  
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		  
  if ( !$wpdb->get_var( "SHOW TABLES LIKE '$reflexGalleries'" ) ) {
			
	$sql = "CREATE TABLE $reflexGalleries (".
		"Id INT NOT NULL AUTO_INCREMENT, ".
		"name VARCHAR( 30 ) NOT NULL, ".
		"slug VARCHAR( 30 ) NOT NULL, ".
		"description TEXT NOT NULL, ".
		"thumbwidth INT, ".
		"thumbheight INT, ".
		"PRIMARY KEY Id (Id) ".
		")";
	
	dbDelta( $sql );
  }
  
  if ( !$wpdb->get_var( "SHOW TABLES LIKE '$reflexImages'" ) ) {
  
	$sql = "CREATE TABLE $reflexImages (".
			"Id INT NOT NULL AUTO_INCREMENT, ".
			"gid INT NOT NULL, ".
			"imagePath LONGTEXT NOT NULL, ".
			"title VARCHAR( 50 ) NOT NULL, ".
			"description LONGTEXT NOT NULL, ".
			"sortOrder INT NOT NULL, ".
			"PRIMARY KEY Id (Id) ".
			")";

	dbDelta( $sql );

	add_option( "reflex_gallery_db_version", array($this, $reflex_gallery_db_version) );
  }
}
?>