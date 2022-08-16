(function() {
    tinymce.create('tinymce.plugins.ReFlexGallery', {
        init : function(ed, url) {
			
			var t = this;
            
			ed.addButton('rfgselector', {
                title : 'ReFlex Gallery',
				text : 'ReFlex Gallery',
                cmd : 'rfgselector'
                //image :  url + '/code.png'				
            });
			
			ed.addCommand('rfgselector', function() {
                var width = jQuery(window).width(), H = jQuery(window).height(), W = ( 720 < width ) ? 720 : width;
                    W = W - 80;
                    H = H - 84;
                    tb_show( 'Insert ReFlex Gallery shortcode', '#TB_inline?width=' + W + '&height=' + H + '&inlineId=reflex-gallery-form' );
                				
            });
        }
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'rfgbutton', tinymce.plugins.ReFlexGallery );
})();

jQuery(function(){
    // creates a form to be displayed everytime the button is clicked
    // you should achieve this using AJAX instead of direct html code like this
    var form = jQuery('<div id="reflex-gallery-form"><table id="reflex-gallery-table" class="form-table" style="text-align: left">\
         \
            \
        <tr>\
        <th><label class="title" for="reflex-gallery-select">ReFlex Gallery</label></th>\
            <td><select id="reflex-gallery-select">\
</select><br />\
        </td>\
        </tr>\</table>\
    <p class="submit">\
        <input type="button" id="reflex-gallery-insert" class="button-primary" value="Insert shortcode" name="submit" style=" margin: 10px 150px 50px; float:left;"/>\
    </p>\
    </div>');

    var table = form.find('table');
    form.appendTo('body').hide();
	
	var galleries;
	var galleryOptions;
	
	jQuery.ajax({
		type: "POST",
		url: '../wp-content/plugins/reflex-gallery/admin/ws.php',
		success: function(result) {
			galleries = result.ReFlexGallery;
			for (var i = 0; i < galleries.length; i++) {
				galleryOptions += "<option value='"+galleries[i].id+"'>"+galleries[i].name+"</option>";
			}
			jQuery('#reflex-gallery-select').append(galleryOptions);
		}
	});

    // handles the click event of the submit button
    jQuery('#reflex-gallery-insert').on('click', function(){
        // defines the options and their default values
        // again, this is not the most elegant way to do this
        // but well, this gets the job done nonetheless        

		var key = jQuery('#reflex-gallery-select option:selected').val();
        var shortcode = "[ReflexGallery id='"+key+"']";
         

        // inserts the shortcode into the active editor
        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, shortcode);

        // closes Thickhighlight
        tb_remove();
    });
});