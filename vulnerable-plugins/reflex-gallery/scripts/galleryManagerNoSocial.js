//
// Plugin Name: ReFlex Gallery
// Plugin URI: http://labs.hahncreativegroup.com/reflex-gallery/
//
jQuery(window).load(function() {		
		
		var Gallery = (function() {
			var fGallery = createFGalleries();
			var pGallery = createPGallery();
			var isFlex = (jQuery('body').width() <= 480) ? true : false;
			function switchGallery(val) {
				isFlex = val;
			}
			
			function createFGalleries() {
				var fGalleries = [];
				
				jQuery(".flexslider").each(function(index){
					fGalleries.push("<div class=\"flexslider\">"+jQuery(this).html()+"</div>");							   
				});
				
				return fGalleries;
			}
			
			function createPGallery() {
				var pGalleries = [];				
				
				jQuery(".flexslider").each(function(index){				  
				  
					  var that = jQuery(this).children(".slides");
					  
					  var width = (that.attr("data-width") == 0) ? "" : " width='"+that.attr("data-width")+"'";
					  var height = (that.attr("data-height") == 0) ? "" : " height='"+that.attr("data-height")+"'";
					  
					  var galleryImgs = [];
					  var imageTitles = [];
					  var imageDesc = [];
					  var alt;
					  
					  that.children("li").each(function(index, el) {
							
					  var alt = (jQuery(el).children('img').attr('alt') === undefined) ? "" : jQuery(el).children('img').attr('alt');
					  
					  galleryImgs.push("'" + jQuery(el).children('img').attr('src') + "'");
					  imageTitles.push("'" + alt + "'");
					  imageDesc.push("'"+jQuery(el).children('.flex-caption').text()+"'");
						
				 });
				  
				    var gallery = "<span class='reflex-gallery'><a style='cursor: pointer;' onclick=\"var images=["+galleryImgs+"]; var titles=["+imageTitles+"]; var descriptions=["+imageDesc+"]; jQuery.prettyPhoto.open(images,titles,descriptions);\"><img class='dShadow' src="+galleryImgs[0]+""+width+height+" /></a></span>";
				
					pGalleries.push(gallery);
				
				});
				return pGalleries;
			}
			
			return {
				renderPGallery: function() {
					switchGallery(true);
					jQuery(".flexslider").each(function(index){
					  jQuery(this).replaceWith(pGallery[index]);
					});
					jQuery("a[rel^='prettyPhoto']").prettyPhoto({counter_separator_label:' of ',theme:'light_rounded',overlay_gallery:true,social_tools:false});
					jQuery(window).bind('resize', function() {handleScreenSize(Gallery);});
				},
				renderFGallery: function() {
					switchGallery(false);					
					jQuery(".reflex-gallery").each(function(index){
					  jQuery(this).replaceWith(fGallery[index]);
					});
					jQuery('.flexslider').flexslider();
				},
				
				IsFlex: function() {
					return isFlex;
				}
			}
		})();
		
		handleScreenSize(Gallery);
		jQuery(window).bind('resize' ,function() {handleScreenSize(Gallery);});	
		
	});
	
	function handleScreenSize(g) {
		var screenWidth = jQuery('body').width();			
		
		if (screenWidth > 480) {
			if(!g.IsFlex()) {
				g.renderPGallery();
			}
		}
		else {
			if(g.IsFlex()) {
				g.renderFGallery();
			}
		}		
	}