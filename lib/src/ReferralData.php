<?php

class UrgeReferralData {

	private $client;

	public function __construct(){
		$this->Urge = new Urge;
		add_action('woocommerce_checkout_update_order_meta', array($this, 'update_order_meta') );
		add_action('woocommerce_admin_order_data_after_billing_address', array($this, 'display_admin_order_meta'), 10, 1 );
		add_filter( 'woocommerce_email_order_meta_fields', array($this, 'email_order_meta_fields'), 10, 3 );
		add_action( 'woocommerce_after_order_notes', array($this, 'custom_checkout_fields') );

	}

	/**
	 * Add custom fields to the checkout page
	 * @param  [type] $checkout [description]
	 * @return [type]           [description]
	 */
	function custom_checkout_fields( $checkout ) {

	    echo '<h3>' . __('Referral Information') . '</h3>';
	    echo '<p>Who referred you for these products? Select the Location and Provider below.</p>';
	    echo '<div id="referred-by">';

	    woocommerce_form_field( 'referral_location', array(
	        'type'          => 'select',
	        'options' => $this->locationsForSelection(),
	        'required'      => false,
	        'class'         => array('form-row-first'),
	        'label'         => __('Referral Location'),
	        'placeholder'   => __('Referral Location'),
	        ), $checkout->get_value( 'referral_location' ));

	    woocommerce_form_field( 'referral_provider', array(
	        'type'          => 'select',
	        'options' => $this->providersForSelection(),
	        'required'      => false,
	        'class'         => array('form-row-last'),
	        'label'         => __('Referral Provider'),
	        'placeholder'   => __('Referral Provider'),
	        ), $checkout->get_value( 'referral_provider' ));

	    echo '</div>';

	    ?>
	    <script>

	    jQuery(document).ready(function($){
	      $('#referral_provider').select2();
	      $('#referral_location').select2();
	    })
	    </script>
	    <?php
	}


	/**
	 * Update the custom order meta data
	 * @param  [type] $order_id [description]
	 * @return [type]           [description]
	 */
	function update_order_meta( $order_id ) {

	   if ( ! empty( $_POST['referral_location'] ) ) {
	       update_post_meta( $order_id, 'referral_location', $_POST['referral_location'] );
	   }

	   if ( ! empty( $_POST['referral_provider'] ) ) {
	       update_post_meta( $order_id, 'referral_provider', $_POST['referral_provider'] );
	   }

	}


	/**
	 * Display field value on the order edit page
	 * @param  [type] $order [description]
	 * @return [type]        [description]
	 */
	function display_admin_order_meta($order){
		echo '<p><strong>'.__('Referral Location').':</strong> ' . get_post_meta( $order->id, 'referral_location', true ) . '</p>';
		echo '<p><strong>'.__('Referral Provider').':</strong> ' . get_post_meta( $order->id, 'referral_provider', true ) . '</p>';
	}


	/**
	 * Adds the custom order data to the emails
	 * @param  [type] $fields        [description]
	 * @param  [type] $sent_to_admin [description]
	 * @param  [type] $order         [description]
	 * @return [type]                [description]
	 */
	function email_order_meta_fields( $fields, $sent_to_admin, $order ) {
	    $fields['referral_location'] = array(
	        'label' => __( 'Referral Location' ),
	        'value' => get_post_meta( $order->id, 'referral_location', true ),
	    );
	    $fields['referral_provider'] = array(
	        'label' => __( 'Referral Provider' ),
	        'value' => get_post_meta( $order->id, 'referral_provider', true ),
	    );

	    return $fields;
	}

	public function locationsForSelection(){
		$locations = [];
		$locations['Select a Location'] = 'Select a Location';
		foreach($this->Urge->locations() as $location){
			$name = get_the_title($location);
			$locations[$name] = $name;
		}
		return $locations;
	}

	public function providersForSelection(){
		$providers = [];
		$providers['Select a Provider'] = 'Select a Provider';
		foreach($this->Urge->providers(['all' => true]) as $provider){
			$name = get_the_title($provider);
			$providers[$name] = $name;
		}
		return $providers;
	}

}

new UrgeReferralData;
