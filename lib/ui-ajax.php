<?php

/*
 * Ajax all of the things!
 */

add_action('wp_ajax_nopriv_do_ajax', 'our_ajax_function');
add_action('wp_ajax_do_ajax', 'our_ajax_function');

function our_ajax_function(){

	// $nonce = $_POST['security'];
	// if ( ! wp_verify_nonce( $nonce, 'submit_picture' ) ) {
	//   exit; // Get out of here, the nonce is rotten!
	// }
	check_ajax_referer('submit_picture','security');

	switch($_POST['fn']){
        case 'contact':
			$output = contact($_POST);
        break;

        case 'schedule':
			$output = schedule($_POST);
        break;
    }

	$output = json_encode($output);

	if(is_array($output)){
		print_r($output);
	}else{
		echo $output;
	}
	wp_die();
}


function contact($data){

	$notify = array();



	$html = '<div style="width: 600px; margin: 0 auto;">';
	$html .= '<div style="text-align: center; padding: 15px; margin-bottom: 1em; background: #fff;">';
 $html .= '<a href="'.get_bloginfo('url').'" title="'.get_bloginfo('title').'"><img style="margin:0 auto;" width="200" height="auto" src="' . $_POST['siteurl'] . 'ui-beaumont/img/ALCLogo@2x.png" alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').'" /></a>';
	$html .= '</div>';
	$html .= '<table style="border: 1px solid #2b2b2b; border-collapse: collapse; width: 100%;">';
	$html .= '<tr><td colspan="2" style="padding: 10px; text-align: center;font-weight: 700;"><h2 style="margin:0;">Contact Confirmation</h2></td></tr>';
	$html .= '<tr><td colspan="2" style="padding: 10px; text-align: center;font-weight: 700;">Thank you for your submission. The ' .get_bloginfo('name'). ' team will respond to you shortly!</td></tr>';
	foreach($data['data'] as $data){
		if($data['name'] == 'name'){ $name = ucwords($data['value']); }
		if($data['name'] == 'email'){ $email = $data['value']; }
		if($data['name'] == 'message'){ $name = ucwords($data['value']); }
		$html .= '<tr style="border: 1px solid #2b2b2b;"><td style="width: 30%; padding: 10px; border: 1px solid #2b2b2b;">'.str_replace('_',' ', ucfirst($data['name'])).'</td><td style="width: 70%; padding: 10px; border: 1px solid #2b2b2b;">'.ucfirst($data['value']).'</td></tr>';
	}
	$html .= '</table>';
	$html .= '</div>';

	$email_message = $html;


	add_filter( 'wp_mail_content_type', 'set_html_content_type' );

	$emails = array( $email, 'nitya.hoyos@Urgeinteractive.com' );
	$emails = array( $email, '' );

	$headers = array();
 $headers[] = 'From: '.get_bloginfo('name').' <noreply@xx.com>' . "\r\n";

 $mail_send = wp_mail( $emails , 'Schedule Request for '.get_bloginfo('name').'', $email_message, $headers );

 remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

 if($mail_send == true) {
   $message = '<p class="alert alert-success" id="contact-success">Your message was sent successfully!</p>';
 } else {
   $message = '<p class="alert alert-danger">Unable to send, please try again later.</p>';
 }

 return $message;
}


function schedule($data){



	$notify = array();
	
	$html = '<div style="width: 600px; margin: 0 auto;">';
  		$html .= '<div style="text-align: center; padding: 15px; margin-bottom: 1em; background: #5091CD;">';
			$html .= '<a href="'.get_bloginfo('url').'" title="'.get_bloginfo('title').'"><img style="margin:0 auto;" src="' . $_POST['siteurl'] . '/wp-content/themes/ui-beaumont/img/ALCLogo@2x.png" width="200" height="auto" alt="'.get_bloginfo('name').'" title="'.get_bloginfo('name').'" /></a>';
		$html .= '</div>';
		$html .= '<table style="border: 1px solid #2b2b2b; border-collapse: collapse; width: 100%;">';
			$html .= '<tr><td colspan="2" style="padding: 10px; text-align: center;font-weight: 700;"><h2 style="margin:0;">Appointment Confirmation</h2></td></tr>';
			$html .= '<tr><td colspan="2" style="padding: 10px; text-align: center;font-weight: 700;">Thank you for your request. The ' .get_bloginfo('name'). ' team will respond to you shortly!</td></tr>';

			foreach($data['data'] as $data){
				if($data['name'] == 'name'){ $name = ucwords($data['value']); }
				if($data['name'] == 'email'){ $email = $data['value']; }
				if($data['name'] == 'phone'){ $name = $data['value']; }

				$html .= '<tr style="border: 1px solid #2b2b2b;"><td style="width: 30%; padding: 10px; border: 1px solid #2b2b2b;">'.str_replace(array('_', '-'),' ', ucfirst($data['name'])).'</td><td style="width: 70%; padding: 10px; border: 1px solid #2b2b2b;">'.ucfirst($data['value']).'</td></tr>';
			}
		$html .= '</table>';
	$html .= '</div>';

	$email_message = $html;

	add_filter( 'wp_mail_content_type', 'set_html_content_type' );



	$emails = array( $email, 'nitya.hoyos@urgeinteractive.com' );
  //$emails = array( $email, 'info@xx.com' );


	$headers = array();
	// $headers[] = 'From: '.get_bloginfo('name').' <noreply@xx.com>' . "\r\n";
  	//$headers[] = 'Bcc: '.get_bloginfo('name').' <tracking@urgeinteractive.com>' . "\r\n"; 

	$mail_send = wp_mail( $emails , 'Schedule Request for '.get_bloginfo('name').'', $email_message, $headers );

	remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
  
	if($mail_send == true) {
		$message = '<p class="alert alert-success" id="contact-success">Your message was sent successfully!</p>';
	} else {
		$message = '<p class="alert alert-danger">Unable to send, please try again later.</p>';
	}

	return $message;
}




