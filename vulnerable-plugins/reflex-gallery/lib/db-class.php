<?php
class ReflexDB {
	
	private static $pInstance;
	
	private function __construct() {}
	
	public static function getInstance() {
		if(!self::$pInstance) {
			self::$pInstance = new ReflexDB();
		}
		
		return self::$pInstance;
	}
	
	public function query() {
		return "Test";	
	}
	
	public function addGallery($galleryName, $slug, $galleryDescription, $thumbwidth, $thumbheight) {
		global $wpdb;		  
		$galleryAdded = $wpdb->insert( $wpdb->reflexGalleries, array( 'name' => $galleryName, 'slug' => $slug, 'description' => $galleryDescription, 'thumbwidth' => $thumbwidth, 'thumbheight' => $thumbheight ) );
		return $galleryAdded;
	}
	
	public function getNewGalleryId() {
		global $wpdb;
		return $wpdb->insert_id;
	}
	
	public function deleteGallery($gid) {
		global $wpdb;
		$wpdb->query( "DELETE FROM $wpdb->reflexImages WHERE gid = '$gid'" );
		$wpdb->query( "DELETE FROM $wpdb->reflexGalleries WHERE Id = '$gid'" );
	}
	
	public function editGallery($gid, $galleryName, $slug, $galleryDescription, $thumbwidth, $thumbheight) {
		global $wpdb;
		$imageEdited = $wpdb->update( $wpdb->reflexGalleries, array( 'name' => $galleryName, 'slug' => $slug, 'description' => $galleryDescription, 'thumbwidth' => $thumbwidth, 'thumbheight' => $thumbheight ), array( 'Id' => $gid ) );
		
		return $imageEdited;
	}
	
	public function getGalleryById($id) {
		global $wpdb;
		$query = "SELECT * FROM $wpdb->reflexGalleries WHERE Id = '$id'";
		$gallery = $wpdb->get_row($query);
		return $gallery;
	}
	
	public function getGalleries() {
		global $wpdb;
		$query = "SELECT Id, name, slug, description FROM $wpdb->reflexGalleries";
		$galleryResults = $wpdb->get_results( $query );
		return $galleryResults;
	}
	
	public function addImage($gid, $image) {
		global $wpdb;		
		$imageAdded = $wpdb->insert( $wpdb->reflexImages, array( 'gid' => $gid, 'imagePath' => $image, 'title' => "", 'description' => "", 'sortOrder' => 0 ) );		
		return $imageAdded;
	}
	
	public function addFullImage($gid, $image, $title, $desc, $sort) {
		global $wpdb;
		$slug = $slug = mb_convert_case(str_replace(" ", "-", $title), MB_CASE_LOWER, "UTF-8");
		$time = time(); $date = date('Y-m-d H:i:s',$time);
		$imageAdded = $wpdb->insert( $wpdb->reflexImages, array( 'gid' => $gid, 'imagePath' => $image, 'title' => $title, 'description' => $desc, 'sortOrder' => $sort ) );
				
		return $imageAdded;
	}
	
	public function deleteImage($id) {
		global $wpdb;
		$query = "DELETE FROM $wpdb->reflexImages WHERE Id = '$id'";
		if($wpdb->query($query) === FALSE) {
			return false;
		}
		else {
			return true;
		}
	}
	
	public function editImage($id, $image, $imageTitle, $imageDescription, $sortOrder) {
		global $wpdb;
		$imageEdited = $wpdb->update( $wpdb->reflexImages, array( 'imagePath' => $image, 'title' => $imageTitle, 'description' => $imageDescription, 'sortOrder' => $sortOrder ), array( 'Id' => $id ) );
		return $imageEdited;
	}
	
	public function getImagesByGalleryId($gid) {
		global $wpdb;
		$query = "SELECT * FROM $wpdb->reflexImages WHERE gid = $gid ORDER BY sortOrder ASC";
		$imageResults = $wpdb->get_results( $query );
		return $imageResults;
	}
	
	public function getGalleryByGalleryId($gid) {
		global $wpdb;
		$query = "SELECT $wpdb->reflexGalleries.*, $wpdb->reflexImages.* FROM $wpdb->reflexGalleries INNER JOIN $wpdb->reflexImages ON ($wpdb->reflexGalleries.Id = $wpdb->reflexImages.gid) WHERE $wpdb->reflexGalleries.Id = '$gid' ORDER BY sortOrder ASC";			
		$gallery = $wpdb->get_results( $query );		
		return $gallery;
	}
}
?>