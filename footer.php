<?php if ( !defined('ABSPATH') ) die();
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage From_Scratch
 * @since From Scratch 1.0
 */
?>

		</div> <? // END content ?>
			
			
	<footer id="site_foot" class="row">
		<div class="col-12">				
			
			<p class="footer-copyright">
				© <?php echo date('Y '); if (get_option('fs_settings')['fs_copyright']) { echo get_option('fs_settings')['fs_copyright']; } ?>
			</p>
			
			<nav class="footer-nav">
			<?php wp_nav_menu( array(
					'theme_location'	=> 	'footer_menu',
					'menu_class'		=>	'footer-menu',
					'container'			=>	false
					));
			?>
			</nav>
			
		</div>
	</footer>
		
		
</div> <? // END wrapper ?>

<?php wp_footer(); ?>

</body>
</html>
