jQuery(document).ready(function($){
	'use strict';




	$( '#mytheme_datepicker' ).datepicker();

	



	$(document).on( 'click', '.upload_image_button', upload_image_button )
		   .on( 'click', '.remove_image_button', remove_image_button );





	function upload_image_button(e) {
		e.preventDefault();
		var $this = $( e.currentTarget );
		var $input_field = $this.prev();
		var $image = $this.parent().find( '.uploaded_image' );
		var custom_uploader = wp.media.frames.file_frame = wp.media({
			title: 'Add Image',
			button: { 
				text: 'Add Image'
			},
			multiple: false
		});
		custom_uploader.on('select', function() {
			var attachment = custom_uploader.state().get( 'selection' ).first().toJSON();
			$input_field.val( attachment.url );
			$image.html( '<img src="' + attachment.url + '" />' );
		});
		custom_uploader.open();
	}

	function remove_image_button(e) {
		e.preventDefault();
		var $this = $( e.currentTarget );
		var $input_field = $this.parent().find( '.featured_image_upload' );
		var $image = $this.parent().find( '.uploaded_image' );

		$input_field.val( '' );
		$image.html( '' );
	}

		$( document ).on( 'click', '#manage_gallery', upload_gallery_button )
				 .on( 'click', '#empty_gallery', empty_gallery_button )
				 .on( 'click', '.gallery-item .remove', empty_single_image );
	 
	function upload_gallery_button(e) {
		var $this = $( e.currentTarget );
		e.preventDefault();
		if ( ! $this.data( 'lockedAt' ) || + new Date() - $this.data( 'lockedAt' ) > 300) { // Doubleclick prevent.
			var $input_field = $( '#mytheme_gallery_input' );
			var ids = $input_field.val();
			var gallerysc = '[gallery ids="' + ids + '"]';
			wp.media.gallery.edit( gallerysc ).on('update', function(g) {
				var id_array = [];
				var url_array = [];
				$.each(g.models, function(id, img){
					url_array.push( img.attributes.url );
					id_array.push( img.id );
				});
				var ids = id_array.join( "," );
				ids = ids.replace( /,\s*$/, "" );
				var urls = url_array.join( "," );
				urls = urls.replace( /,\s*$/, "" );
				$input_field.val( ids );
				var html = '';
				for (var i = 0 ; i < url_array.length; i++) {
					html += '<div class="gallery-item" data-id="' + id_array[i] + '"><div class="remove">x</div><img src="' + url_array[i] + '"></div>';
				}
	 
				$( '.gallery_images' ).html( '' ).append( html );
			});
		}
		$this.data( 'lockedAt', + new Date() );
	}
	 
	function empty_gallery_button(e){
		e.preventDefault();
		var $input_field = $( '#mytheme_gallery_input' );
		$input_field.val( '' );
		$( '.gallery_images' ).html( '' );
	}
	 
	 
	Array.prototype.remove = function() {
		var what, a = arguments, L = a.length, ax;
		while (L && this.length) {
			what = a[--L];
			while ((ax = this.indexOf( what )) !== -1) {
				this.splice( ax, 1 );
			}
		}
		return this;
	};
	 
	function empty_single_image(e){
		e.preventDefault();
		var $this = $( this );
		var value = $this.parent().data( 'id' );
		var $this_image = $this.parent().find( 'img' );
		var $this_image_url = $this_image.attr( 'src' );
		var $input_field = $( '#mytheme_gallery_input' );
		var existing_values_arr = $input_field.val().split( ',' );
		var new_arr = existing_values_arr.remove( value.toString() );
		var replace_str = new_arr.join();
		$input_field.val( '' ).val( replace_str );
		$this.parent().remove();
	}




});


