<?php
/**
 * Top Bar
 * @package RT-Theme 19 
 */

$show_top_bar = apply_filters("rt_show_top_bar",true);

if( ( has_action( "rt_topbar_left" ) || has_action( "rt_topbar_right" ) ) && $show_top_bar && rtframework_get_setting("display_topbar") ):
$topbar_width = apply_filters( "topbar_width", get_theme_mod( RT_THEMESLUG.'_top_bar_width' ) );
$topbar_content_width = apply_filters( "topbar_content_width", get_theme_mod( RT_THEMESLUG.'_top_bar_content_width' ) );
?>
<div class="businesslounge-top-bar<?php echo $topbar_width == "fullwidth" ? " fullwidth" : ""; ?>">
	<div class="top-bar-inner<?php echo $topbar_content_width == "fullwidth" ? " fullwidth" : ""; ?>">
		<div class="top-bar-left">
			<?php
			/**
			 * rt_topbar_left hook
			 * @hooked rt_topbar_left_sidebar - 10
			 */
			do_action("rt_topbar_left");
			?>
		</div>
		<div class="top-bar-right">
			<?php
			/**
			 * rt_topbar_right hook
			 * @hooked rt_topbar_right_sidebar - 10
			 */
			do_action("rt_topbar_right");
			?>
		</div>
	</div>
</div>
<?php endif;?>
