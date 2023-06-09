<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * RT-Theme Blog Options
 */
		$this->options["rt_blog_options"] = array(

				'title' => esc_html_x("Blog Options", 'Admin Panel','businesslounge'), 
				'description' => "", 
				'priority' => 6,
				'sections' => array(

									array(
										'id'       => 'misc',
										'title'    => esc_html_x("Global Layout Options", 'Admin Panel','businesslounge'), 
										'controls' => array( 
															array(
																"id"          => "businesslounge_blog_layout",															
																"label"       => esc_html_x("Layout",'Admin Panel','businesslounge'),
																"description" => esc_html_x("Select and set a default column layout for the blog category & archive listing pages for each of the (single) post items listed within those pages.",'Admin Panel','businesslounge'),
																"choices"     =>  array(
																					"1/6" => "1/6", 
																					"1/4" => "1/4",
																					"1/3" => "1/3",
																					"1/2" => "1/2",
																					"1/1" => "1/1"
																		  		),			
																"default"   => "1/1",
																"transport" => "refresh", 
																"type"      => "select"
															),										
															array(
																'id'          => 'businesslounge_blog_layout_style',
																'label'       => esc_html_x("Layout Style",'Admin Panel','businesslounge'),
																"description" => esc_html_x("Select and set a default layout style for the blog category & archive listing pages",'Admin Panel','businesslounge'),
																'type'        => 'select',
																'default'     => 'grid',
																"transport"   => "refresh",
																'choices'     => array(
																					"grid"    => esc_html_x("Grid",'Admin Panel','businesslounge'),
																					"masonry" => esc_html_x("Masonry",'Admin Panel','businesslounge'),
																				),
															),													
													),
									),							

									array(
										'id'          => 'featured_img',									
										'title'       => esc_html_x("Featured Images", 'Admin Panel','businesslounge'), 
										"description" => wp_kses( _x('Enable the "Image Resize" to resize or crop the featured images automatically. These settings will be used as globaly and you can change for each portfolio post individiually (via edit post screen). <br /> Please note, since the theme is reponsive the images cannot be wider than the column they are in. Leave values "0" to use theme defaults.','Admin Panel','businesslounge'), array("a"=>array(),"br"=>array()) ),
										'controls'    => array( 


															array(
																"id"          => "businesslounge_fi_listing",	
																"label" => esc_html_x('Post Listing Pages','Admin Panel','businesslounge'),															
																"type"        => "rt_subsection_heading"
															),

															array(
																"label"       => esc_html_x("Image Resize",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_blog_image_resize",
																"choices"     => array(
																					"false" => esc_html_x("Disabled",'Admin Panel','businesslounge'),						
																					"true" => esc_html_x("Enabled",'Admin Panel','businesslounge'),
																				),			
																"default"   => "true",
																"transport" => "postMessage", 
																"type"      => "select"
															),		

															array(
																"label"       => esc_html_x("Featured Image Max Width",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_blog_image_width",
																"default"     => 0, 
																"type"        => "number",
																"transport"   => "postMessage",
																"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => "businesslounge_blog_image_resize", "data-depends-values" => "true")
															),


															array(
																"label"       => esc_html_x("Featured Image Max Height",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_blog_image_height",
																"default"     => 0, 
																"type"        => "number",
																"transport"   => "postMessage",
																"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => "businesslounge_blog_image_resize", "data-depends-values" => "true")
															),

															array(
																"label"       => esc_html_x("Crop Featured Image",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_blog_image_crop",
																"default"     => "",
																"transport"   => "postMessage",
																"type"        => "rt_checkbox",
																"input_attrs" => array("data-depends-id" => "businesslounge_blog_image_resize", "data-depends-values" => "true")
															),


															array(
																"id"          => "businesslounge_fi_single",	 
																"label" => esc_html_x('Single Post Pages','Admin Panel','businesslounge'),															
																"type"        => "rt_subsection_heading"
															),


															array(
																"label"       => esc_html_x("Image Resize",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_single_blog_image_resize",
																"choices"     => array(
																					"false" => esc_html_x("Disabled",'Admin Panel','businesslounge'),						
																					"true" => esc_html_x("Enabled",'Admin Panel','businesslounge'),
																				),			
																"default"   => "true",
																"transport" => "postMessage", 
																"type"      => "select"
															),		

															array(
																"label"       => esc_html_x("Featured Image Max Width",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_single_blog_image_width",
																"default"     => 0, 
																"type"        => "number",
																"transport"   => "postMessage",
																"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => "businesslounge_single_blog_image_resize", "data-depends-values" => "true")
															),


															array(
																"label"       => esc_html_x("Featured Image Max Height",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_single_blog_image_height",
																"default"     => 0, 
																"type"        => "number",
																"transport"   => "postMessage",
																"input_attrs" => array("min"=>0,"max"=>3000, "data-depends-id" => "businesslounge_single_blog_image_resize", "data-depends-values" => "true")
															),

															array(
																"label"       => esc_html_x("Crop Featured Image",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_single_blog_image_crop",
																"default"     => "",
																"transport"   => "postMessage",
																"type"        => "rt_checkbox",
																"input_attrs" => array("data-depends-id" => "businesslounge_single_blog_image_resize", "data-depends-values" => "true")
															),


													),
									),		

									array(
										'id'          => 'excerpts',									
										'title'       => esc_html_x("Excerpts", 'Admin Panel','businesslounge'), 
										"description" => wp_kses(_x("As default the full blog content will be displayed on the blog listing pages and blog categories.  Enable the <a href=\"http://en.support.wordpress.com/splitting-content/excerpts/\">Excerpts</a> ( check the 'Use excerpts..' box below ) to minify the content automatically by using WordPress's excerpt option.  You can keep disabled and split your content manually by using <a href=\"http://en.support.wordpress.com/splitting-content/more-tag/\">The More Tag</a>",'Admin Panel','businesslounge'),array("a"=>array("href"=>array()),"br"=>array())),
										'controls'    => array( 

															array(
																"label"       => esc_html_x("Use excerpts",'Admin Panel','businesslounge'), 
																"id"          => "businesslounge_use_excerpts",
																"default"     => "on",
																"transport"   => "postMessage",
																"type"        => "checkbox"
															),

													),
									),		


									array(
										'id'          => 'meta',									
										'title'       => esc_html_x("Post Meta", 'Admin Panel','businesslounge'), 
										"description" => esc_html_x("Customize the post meta info that displayed with posts.",'Admin Panel','businesslounge'),
										'controls'    => array( 


														array(
															"id"          => "businesslounge_archive_post_meta",	 
															"label" => esc_html_x('For Listing Pages (Categories, Archives, Search)','Admin Panel','businesslounge'),															
															"type"        => "rt_subsection_heading"
														),

															array(
																"label"     => esc_html_x("Show the Author Name",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_author",
																"type"      => "checkbox",
																"default"   => "on",
																"transport" => "refresh",
															),

															array(
																"label"     => esc_html_x("Show Categories",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_categories",
																"type"      => "checkbox",
																"default"   => "on",
																"transport" => "refresh",
															), 		

															array(
																"label"     => esc_html_x("Show Comment Numbers",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_comment_numbers",
																"type"      => "checkbox",
																"default"   => "",
																"transport" => "refresh",
															), 	

															array(
																"label"     => esc_html_x("Show Post Dates",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_date",
																"default"   => "on",
																"type"      => "checkbox",
																"transport" => "refresh",
															), 	

															array(
																"label"     => esc_html_x("Show Social Share",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_share",
																"default"   => "",
																"type"      => "checkbox",
																"transport" => "refresh",
															), 	

														array(
															"id"          => "businesslounge_single_post_meta",	
															"label" => esc_html_x('For Single Post Pages','Admin Panel','businesslounge'),															
															"type"        => "rt_subsection_heading"
														),

															array(
																"label"     => esc_html_x("Show the Author Name",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_author_single",
																"type"      => "checkbox",
																"default"   => "on",
																"transport" => "refresh",
															),

															array(
																"label"     => esc_html_x("Show Categories",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_categories_single",
																"type"      => "checkbox",
																"default"   => "on",
																"transport" => "refresh",
															), 

															array(
																"label"     => esc_html_x("Show Post Dates",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_date_single",
																"default"   => "on",
																"type"      => "checkbox",
																"transport" => "refresh",
															), 	

															array(
																"label"     => esc_html_x("Show Social Share",'Admin Panel','businesslounge'),
																"id"        => "businesslounge_show_share_single",
																"default"   => "on",
																"type"      => "checkbox",
																"transport" => "refresh",
															), 	


													),
									),

									array(
										'id'          => 'single',									
										'title'       => esc_html_x("Single Post Page", 'Admin Panel','businesslounge'), 
										'controls'    => array( 

															array(
																"label"       => esc_html_x("Blog Name",'Admin Panel','businesslounge'),
																"description" => esc_html_x("The name that will be displayed as page title inside the header area of single post pages. Leave it blank to use the current post title.",'Admin Panel','businesslounge'),
																"id"          => "businesslounge_blog_page_name",
																"type"        => "text",
																"default"     => esc_html_x("Blog ",'Admin Panel','businesslounge'),
																"callback"    => "esc_html"
															),

															array(
																"label"   => esc_html_x("Display author info box under posts",'Admin Panel','businesslounge'),
																"id"      => "businesslounge_show_author_info",
																"type"    => "checkbox",
																"default" => "on",
																"transport" => "refresh"
															),														

																												
													),
									),
							)
			);