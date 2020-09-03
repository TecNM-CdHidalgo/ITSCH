<form class="shortcodes-wrap">
	<br>
	<label for="shortcodes_list">Shortcodes</label>
	<br>
	
	<select id="shortcodes_list" name="shortcodes_list" class="widefat shortcodes-list" style="width: 50%;">
		<option></option>
		<option value="[row]column shortcode here.[/row]">row</option>
		<option value="[column width=&quot;&quot;]Content here.[/column]">column</option>
		<option value="[button text=&quot;&quot; url=&quot;&quot;]">button</option>
		<option value="[social_icon type=&quot;&quot; url=&quot;&quot;]">social_icon</option>
		<option value="[contact_form to=&quot;&quot; subject=&quot;&quot;]">contact_form</option>
		<option value="[tab_wrap titles=&quot;&quot; active=&quot;&quot;]tab shortcode here.[/tab_wrap]">tab_wrap</option>
		<option value="[tab]Text here.[/tab]">tab</option>
		<option value="[accordion_wrap]accordion shortcode here.[/accordion_wrap]">accordion_wrap</option>
		<option value="[accordion title=&quot;&quot;]Text here.[/accordion]">accordion</option>
		<option value="[toggle_wrap]toggle shortcode here.[/toggle_wrap]">toggle_wrap</option>
		<option value="[toggle title=&quot;&quot;]Text here.[/toggle]">toggle</option>
		<option value="[quote align=&quot;&quot; name=&quot;&quot;]Text here.[/quote]">quote</option>
		<option value="[alert type=&quot;&quot;]Text here.[/alert]">alert</option>
		<option value="[timeline]event shortcode here.[/timeline]">timeline</option>
		<option value="[event_group_title icon=&quot;&quot; text=&quot;&quot;]">event_group_title</option>
		<option value="[event date=&quot;&quot; title=&quot;&quot; sub_title=&quot;&quot;]Text here.[/event]">event</option>
		<option value="[skill title=&quot;&quot; percent=&quot;&quot;]">skill</option>
		<option value="[testimonial title=&quot;&quot; sub_title=&quot;&quot; image=&quot;&quot;]Text here.[/testimonial]">testimonial</option>
		<option value="[section_title]Title here.[/section_title]">section_title</option>
		<option value="[fun_fact]An image and Heading 4 title here.[/fun_fact]">fun_fact</option>
		<option value="[service]An image, Heading 4 title and a description here.[/service]">service</option>
	</select>
	
	<br>
	<br>
	<button type="button" class="button button-primary button-large button-insert-shortcode">Insert Shortcode</button>
</form>

<script>
	jQuery(document).ready(function($)
	{
		var selected_shortcode = "";
		
		$( '.shortcodes-list' ).change( function()
		{
			selected_shortcode = $( '.shortcodes-list' ).val();
		});
		
		$( '.button-insert-shortcode' ).click( function()
		{
			if ( window.tinyMCE )
			{
				var tmce_ver = window.tinyMCE.majorVersion;
				
				if ( tmce_ver < "4" )
				{
					window.tinyMCE.execInstanceCommand( 'content', 'mceInsertContent', false, selected_shortcode );
				}
				else
				{
					parent.tinyMCE.execCommand( 'mceInsertContent', false, selected_shortcode );
				}
				
				tb_remove();
			}
		});
	});
</script>