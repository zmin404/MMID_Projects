<?php
if( ! function_exists("rt_shortcode_contact_form") ){
	/**
	 * Contact Forms
	 * @param  array $atts
	 * @param  string $content
	 * @return $contact_form
	 */
	function rt_shortcode_contact_form( $atts, $content = null ) {

	//defaults
	extract(shortcode_atts(array(  
		"id"       => '',
		"class"    => '',
		"email"    => '',
		"security" => true
	), $atts));

	//security
	$security = $security == "false" ? false : $security;	

	$contact_form = "";

	//id attr
	$id = ! empty( $id ) ? 'id="'.sanitize_html_class($id).'"' : "";	 

	//dynamic class for the form
	$dynamic_class="dynamic-class-".rand(100,1000000);

	//are you human quiz
	$security_question = array();
	$security_question['are_you_human_math1']=rand(1, 9);
	$security_question['are_you_human_math2']=rand(1, 99);
	$security_question['are_you_human_sum'] = $security ? ( $security_question['are_you_human_math1'] + $security_question['are_you_human_math2'] ) : "nosecurity";
	$security_question['form_item'] = $security ? '<li class="security-question"><label class="math_label" for="math">'.__('Security Question:','businesslounge').'</label>'.$security_question['are_you_human_math1'].' + '.$security_question['are_you_human_math2'].' = <input id="math" placeholder="?" type="text" name="math" value="" class="required" /></li>' : "" ;

	$contact_form.= !empty( $content ) ? '<p><i class="decs_text">'. html_entity_decode(do_shortcode($content)) .'</i></p>' : "";

	if( ! empty( $email ) ){
 

	$contact_form .= '
		<!-- contact form -->
		<div '.$id.' class="contact_form '.sanitize_html_class($class).' '.$dynamic_class.'">
		<div class="clear"></div><div class="result"></div>
			<form action="#" name="contact_form" class="validate_form rt_form" method="post">
				<ul>
					<li class="form-input"><label for="name">'.__('Your Name: (*)','businesslounge').'</label><input placeholder="'.esc_attr(__('Your Name: (*)','businesslounge')).'" id="name" type="text" name="name" value="" class="required" /> </li>
					<li class="form-input"><label for="email">'.__('Your Email: (*)','businesslounge').'</label><input placeholder="'.esc_attr(__('Your Email: (*)','businesslounge')).'" id="email" type="email" name="email" value="" class="required email" /> </li>
					<li class="form-input"><label for="message">'.__('Your Message: (*)','businesslounge').'</label><textarea placeholder="'.esc_attr(__('Your Message: (*)','businesslounge')).'" id="message" name="message" rows="8" cols="40" class="required"></textarea></li>
					'.$security_question['form_item'].'
					<li class="submit-button">
					<input type="hidden" name="your_email" value="'.trim(base64_encode(sanitize_email($email))).'"><input type="hidden" name="dynamic_class" value="'.trim($dynamic_class).'"><input type="hidden" name="rt_form_data" value="'.base64_encode($security_question['are_you_human_sum']).'"><input type="button" class="button submit" value="'.esc_attr(__('Send','businesslounge')).'"  /><span class="loading"></span>
					</li>
				</ul>
			</form>
		</div><div class="clear"></div>
		<!-- /contact form -->'; 
	}else{
		$contact_form="ERROR: This shortcode does not contain an email attribute!";
	}

	return $contact_form;
	}
}

add_shortcode('contact_form', 'rt_shortcode_contact_form');