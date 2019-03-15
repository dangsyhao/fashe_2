<?php
/**
 *Touring Zone Lite About Theme
 *
 * @package Touring Zone Lite
 */

//about theme info
add_action( 'admin_menu', 'touring_zone_lite_abouttheme' );
function touring_zone_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'touring-zone-lite'), __('About Theme Info', 'touring-zone-lite'), 'edit_theme_options', 'touring_zone_lite_guide', 'touring_zone_lite_mostrar_guide');   
} 

//Info of the theme
function touring_zone_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'touring-zone-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Touring Zone Lite is a clean and simple to use free Tours and Travel WordPress theme. It is developed to create a website for tour and travel agencies, tour operators and tour companies. This free theme can also be used for hotels and resorts, travel agents, vacation cruise, adventure travel and other travel related businesses. This responsive and highly customizable theme has attractive, modern and flat design with stylish color scheme and fonts. The theme is build in WordPress customize and you can see live preview while customizing the theme.','touring-zone-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'touring-zone-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'touring-zone-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'touring-zone-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'touring-zone-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'touring-zone-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'touring-zone-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'touring-zone-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'touring-zone-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'touring-zone-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( TOURING_ZONE_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'touring-zone-lite'); ?></a> | 
            <a href="<?php echo esc_url( TOURING_ZONE_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'touring-zone-lite'); ?></a> | 
            <a href="<?php echo esc_url( TOURING_ZONE_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'touring-zone-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>