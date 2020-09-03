(function($) {

	$('form.ajax-form').submit(function()
	{
		$.ajax(
		{
			data: $(this).serialize(),
			type: "POST",
			beforeSend: function()
			{
				$('.status').removeClass('status-done');
				$('.status img').show();
				$('.status strong').html('Saving...');
				$('.status').fadeIn();
			},
			success: function(data)
			{
				$('.status img').hide();
				$('.status').addClass('status-done');
				$('.status strong').html('Done.');
				$('.status').delay(1000).fadeOut();
			}
		});
		
		return false;
	});


// ====================================================================================================================


	var media_uploader;
	
	$('.button-browse').live('click', function(event)
	{
		event.preventDefault();
		
		$('.button-browse').removeClass('active-upload-button');
		$(this).addClass('active-upload-button');
		
		// If the media uploader already exists, reopen it.
		if (media_uploader)
		{
			media_uploader.open();
		}
		else
		{
			media_uploader = wp.media.frames.media_uploader = wp.media(
			{
				multiple: false
			});
			
			media_uploader.open();
		}
		
		media_uploader.on('select', function()
		{
			var image = media_uploader.state().get('selection').first().toJSON();
			
			$('.active-upload-button').prev('input').val(image.id).trigger('change');
			$('.active-upload-button').next('img').attr('src', image.url).trigger('change');
			$('.button-browse').removeClass('active-upload-button');
		});
	});
	
	
	$('.button-browse-video').live('click', function(event)
	{
		event.preventDefault();
		
		$('.button-browse-video').removeClass('active-upload-button');
		$(this).addClass('active-upload-button');
		
		// If the media uploader already exists, reopen it.
		if (media_uploader)
		{
			media_uploader.open();
		}
		else
		{
			media_uploader = wp.media.frames.media_uploader = wp.media(
			{
				multiple: false
			});
			
			media_uploader.open();
		}
		
		media_uploader.on('select', function()
		{
			var image = media_uploader.state().get('selection').first().toJSON();
			
			$('.active-upload-button').prev('input').val(image.url).trigger('change');
			$('.button-browse-video').removeClass('active-upload-button');
		});
	});


})(jQuery);