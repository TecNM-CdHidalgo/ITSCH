function tiny_plugin(url, params) {
	var popup = params;
	tb_show('Insert Shortcode', url + '/shortcode-generator.php?popup=' + popup + '&width=' + 700 + '&height=' + 500);
}

(function() {
	tinymce.create('tinymce.plugins.tinyplugin',
					{
						init: function(ed, url)
						{
							ed.addButton('tinyplugin',
											{
												title: 'Insert Shortcode',
												onclick: function()
												{
													ed.execCommand('mceInsertContent',
																		false,
																		tiny_plugin(url)
																	);
												},
												image: url + '/shortcode-generator.png'
											}
										);
						}
					}
				);
	
	tinymce.PluginManager.add('tinyplugin', tinymce.plugins.tinyplugin);

})();