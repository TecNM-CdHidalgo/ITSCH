        <footer id="colophon" class="site-footer" role="contentinfo">
			<?php
				if (is_active_sidebar('theblogger_sidebar_5'))
				{
					?>
						<div class="footer-subscribe">
							<div class="layout-medium">
								<?php
									dynamic_sidebar('theblogger_sidebar_5');
								?>
							</div>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_6'))
				{
					?>
						<div class="footer-insta">
							<?php
								dynamic_sidebar('theblogger_sidebar_6');
							?>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_9') || 
					is_active_sidebar('theblogger_sidebar_10') || 
					is_active_sidebar('theblogger_sidebar_11') || 
					is_active_sidebar('theblogger_sidebar_12'))
				{
					?>
						<div class="footer-widgets widget-area">
							<div class="layout-medium">
								<div class="row">
									<?php
										function theblogger_footer_columns_3()
										{
											?>
												<div class="col-md-4">
													<?php
														dynamic_sidebar('theblogger_sidebar_9');
													?>
												</div>
												<div class="col-md-4">
													<?php
														dynamic_sidebar('theblogger_sidebar_10');
													?>
												</div>
												<div class="col-md-4">
													<?php
														dynamic_sidebar('theblogger_sidebar_11');
													?>
												</div>
											<?php
										}
									?>
									<?php
										function theblogger_footer_columns_4()
										{
											?>
												<div class="col-sm-6 col-lg-3">
													<?php
														dynamic_sidebar('theblogger_sidebar_9');
													?>
												</div>
												<div class="col-sm-6 col-lg-3">
													<?php
														dynamic_sidebar('theblogger_sidebar_10');
													?>
												</div>
												<div class="col-sm-6 col-lg-3">
													<?php
														dynamic_sidebar('theblogger_sidebar_11');
													?>
												</div>
												<div class="col-sm-6 col-lg-3">
													<?php
														dynamic_sidebar('theblogger_sidebar_12');
													?>
												</div>
											<?php
										}
									?>
									<?php
										$theblogger_footer_columns = get_theme_mod('theblogger_setting_footer_columns', '4');
										
										if ($theblogger_footer_columns == '3')
										{
											theblogger_footer_columns_3();
										}
										else
										{
											theblogger_footer_columns_4();
										}
									?>
								</div>
							</div>
						</div>
					<?php
				}
			?>
			
			<?php
				if (is_active_sidebar('theblogger_sidebar_7'))
				{
					?>
						<div class="site-info">
							<?php
								dynamic_sidebar('theblogger_sidebar_7');
							?>
						</div>
					<?php
				}
			?>
		</footer>
	</div>
    
	<?php
		wp_footer();
	?>
	
	<script>
		(function($) { "use strict"; 
			$.extend($.validator.messages, {
				required: "<?php esc_html_e('This field is required.', 'theblogger'); ?>",
				remote: "<?php esc_html_e('Please fix this field.', 'theblogger'); ?>",
				email: "<?php esc_html_e('Please enter a valid email address.', 'theblogger'); ?>",
				url: "<?php esc_html_e('Please enter a valid URL.', 'theblogger'); ?>",
				date: "<?php esc_html_e('Please enter a valid date.', 'theblogger'); ?>",
				dateISO: "<?php esc_html_e('Please enter a valid date ( ISO ).', 'theblogger'); ?>",
				number: "<?php esc_html_e('Please enter a valid number.', 'theblogger'); ?>",
				digits: "<?php esc_html_e('Please enter only digits.', 'theblogger'); ?>",
				equalTo: "<?php esc_html_e('Please enter the same value again.', 'theblogger'); ?>",
				maxlength: $.validator.format("<?php esc_html_e('Please enter no more than {0} characters.', 'theblogger'); ?>"),
				minlength: $.validator.format("<?php esc_html_e('Please enter at least {0} characters.', 'theblogger'); ?>"),
				rangelength: $.validator.format("<?php esc_html_e('Please enter a value between {0} and {1} characters long.', 'theblogger'); ?>"),
				range: $.validator.format("<?php esc_html_e('Please enter a value between {0} and {1}.', 'theblogger'); ?>"),
				max: $.validator.format("<?php esc_html_e('Please enter a value less than or equal to {0}.', 'theblogger'); ?>"),
				min: $.validator.format("<?php esc_html_e('Please enter a value greater than or equal to {0}.', 'theblogger'); ?>"),
				step: $.validator.format("<?php esc_html_e('Please enter a multiple of {0}.', 'theblogger'); ?>")
			});
		})(jQuery);
	</script>
</body>
</html>