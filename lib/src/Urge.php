<?php

namespace Urge;

class Urge {

	public $peckingOrder = [
		'md', 'mds' , 'do', 'rn' , 'rnp' , 'msn' , 'ms' , 'mn' , 'pa' , 'fnp', 'le'
	];

	public function __construct() {

	}

	/**
	 * Get a provider by ID
	 *
	 * @param $params
	 *
	 * @return Provider
	 */
	public function provider( $params ) {
		if ( ! is_int( $params ) ) {
			throw new \Exception( 'Provider param must be an integer' );
		}

		return new Provider( $params );
	}

	/**
	 * Get a condition by ID
	 *
	 * @param $params
	 *
	 * @return Condition
	 */
	public function condition( $params ) {
		if ( ! is_int( $params ) ) {
			throw new \Exception( 'Condition param must be an integer' );
		}

		return new Condition( $params );
	}

	/**
	 * Get a promotion by ID
	 *
	 * @param $params
	 *
	 * @return Promotion
	 */
	public function promotion( $params ) {
		if ( ! is_int( $params ) ) {
			throw new \Exception( 'Promotion param must be an integer' );
		}

		return new Promotion( $params );
	}

	/**
	 * Get a location by ID
	 *
	 * @param $params
	 *
	 * @return Location
	 */
	public function location( $params ) {
		if ( ! is_int( $params ) ) {
			throw new \Exception( 'Location param must be an integer' );
		}

		return new Location( $params );
	}

	/**
	 * Get a treatment by ID
	 *
	 * @param $params
	 *
	 * @return Treatment
	 */
	public function treatment( $params ) {
		if ( ! is_int( $params ) ) {
			throw new \Exception( 'Treatment param must be an integer' );
		}

		return new Treatment( $params );
	}

	/**
	 * Get a videogallery by ID
	 *
	 * @param $params
	 *
	 * @return videogallery
	 */
	public function videogallery( $params ) {
		if ( ! is_int( $params ) ) {
			throw new \Exception( 'VideoGallery param must be an integer' );
		}

		return new VideoGallery( $params );
	}

	/**
	 * Get the providers
	 * Example query
	 * providers( ['taxonomy' => 'provider_info','terms' => 'md'] );
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function providers ($params = [])
	{
		$args = [
			'orderby'        => 'post_title',
			'order'          => 'ASC',
			'post_status'    => 'publish',
			'post_type'      => 'providers',
			'posts_per_page' => -1,
		];

		if ( isset( $params['taxonomy'], $params['terms'] ) ) {
			$args['tax_query'] = [
				[
					'taxonomy' => $params['taxonomy'],
					'field'    => 'slug',
					'terms'    => $params['terms'],
				],
			];
		}

		// if ( isset( $params['count'] ) ) {
		// 	$args['posts_per_page'] = $params['count'];
		// }

		$providers_query = new \WP_Query( $args );

		if ( ! $providers_query->have_posts() ) {
			return [];
		}

		if ( $providers_query->have_posts() ) {
			$providers = [];
			while ( $providers_query->have_posts() ) {
				$providers_query->the_post();
				$providers[] = get_the_ID();
			}
			wp_reset_postdata();
		} else {
			$providers = [];
		}
		if(count($providers) > 0){

			$pecking_order = $this->peckingOrder;
			if( isset($params['pecking_order']) ){
				$pecking_order = $params['pecking_order'];
			}

			// create an array of Provider objects out of the array of provider id's
			$providers_array = array_map(function($provider_id) use($pecking_order){
				$provider = new Provider($provider_id);
				return $provider;
			}, $providers);

			$providers = $providers_array;
		}

		//return $providers;

		// create a new array where the keys are the last names of the
		// providers
		$providers_with_lastnames = [];
		foreach($providers as $provider){
			// add the provider to the new array, using their last name as the array key
			$providers_with_lastnames[strtolower($provider->lastName())] = $provider;
		}

		// sorts the array by its keys, in this case
		// those keys are the last names of the providers
		ksort($providers_with_lastnames);
		$providers = $providers_with_lastnames;
		if(isset($params['count'])){
			return array_slice($providers, 0, $params['count']);
		}
		return $providers;
	}


	//
	// Count Display
	//
	public function get_count( $params ) {

		if ( isset( $params['type'] ) ) {
			$count_posts   = wp_count_posts( $params['type'] );
			$content_count = $count_posts->publish;

			return $content_count;
		} elseif ( isset( $params['suffix'] ) ) {
			$args = array(
				'post_status'    => 'publish',
				'post_type'      => 'providers',
				'posts_per_page' => - 1,
				'tax_query'      => array(
					array(
						'taxonomy' => 'provider_info',
						'field'    => 'slug',
						'terms'    => $params['suffix'],
					),
				),
			);

			$count_query   = new \WP_Query( $args );
			$content_count = $count_query->post_count;

			/*
			$count_posts = wp_count_posts($params['type']);
			$published_posts = $count_posts->publish;
			$content_count = $published_posts;
			*/

			echo $content_count;

		}
	}


	/**
	 * Get the locations for Urge
	 * @return array An array of Location objects
	 */
		public function locations() {
		$data      = [];
		$args      = array(
			'posts_per_page' => - 1,
			'post_type'      => 'location',
			'post_status'    => 'publish',
			'orderby'        => 'title',
			'order'          => 'ASC',
		);
		$locations = get_posts( $args );
		foreach ( $locations as $location ) {
			$data[] = new Location( $location->ID );
		}

		return $data;
	}

	/**
	 * Get the conditions
	 * @return array An array of Concern objects
	 */
	public function conditions() {
		$data       = [];
		$args       = array(
			'posts_per_page' => - 1,
			'post_type'      => 'concerns',
			'post_status'    => 'publish',
			'orderby'        => 'title',
			'order'          => 'ASC',
		);
		$conditions = get_posts( $args );
		foreach ( $conditions as $condition ) {
			$data[] = new Condition( $condition->ID );
		}

		return $data;
	}

	/**
	 * Get the Treatments
	 * Example query
	 * treatments( ['taxonomy' => 'treatment_category','terms' => 'general-dermatology'] );
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function treatments( $params ) {

		$args = array(
			'posts_per_page' => - 1,
			'post_type'      => 'treatments',
			'post_status'    => 'publish',
			'orderby'        => 'title',
			'order'          => 'ASC',
		);

		if ( isset( $params['taxonomy'], $params['terms'] ) ) {

			$args = [
				'orderby'        => 'title',
				'order'          => 'ASC',
				'post_status'    => 'publish',
				'post_type'      => 'treatments',
				'posts_per_page' => - 1,
				'tax_query'      => [
					[
						'taxonomy' => $params['taxonomy'],
						'field'    => 'slug',
						'terms'    => $params['terms'],
					],
				],
			];

		}

		$treatments = get_posts( $args );
		$data = [];
		foreach ( $treatments as $treatment ) {
			$data[] = new Treatment( $treatment->ID );
		}

		return $data;
	}

	/**
	 * Get the videogallery
	 * Example query
	 * videogallery( ['taxonomy' => 'treatment_category','terms' => 'general-dermatology'] );
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function videogalleries( $params ) {

		$args = array(
			'posts_per_page' => - 1,
			'post_type'      => 'videogallery',
			'post_status'    => 'publish',
			'orderby'        => 'title',
			'order'          => 'ASC',
		);

		if ( isset( $params['taxonomy'], $params['terms'] ) ) {

			$args = [
				'orderby'        => 'title',
				'order'          => 'ASC',
				'post_status'    => 'publish',
				'post_type'      => 'videogallery',
				'posts_per_page' => - 1,
				'tax_query'      => [
					[
						'taxonomy' => $params['taxonomy'],
						'field'    => 'slug',
						'terms'    => $params['terms'],
					],
				],
			];

		}

		$videogalleries = get_posts( $args );
		$data = [];
		foreach ( $videogalleries as $videogallery ) {
			$data[] = new VideoGallery( $videogallery->ID );
		}

		return $data;
	}

}
