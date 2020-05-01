<?php

namespace Urge;

use Urge\Abstracts\Post;

class Provider extends Post {

    /**
     * @var integer
     */
    public $post_id;

	/**
	 * @var \WP_Term
	 */
    public $credential;

    protected $relations = [
        'events' => 'provider_events',
        'conditions' => 'provider_conditions',
        'locations' => 'provider_locations',
        'testimonials' => 'provider_testimonials',
        'promotions' => 'provider_promotions',
        'treatments' => 'provider_treatments'
    ];

    public function __construct( $param ) {
        $post = get_post($param);
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink($this->post_id);
        $this->department = null;
    }

    public function lastName(){
        $string = strstr($this->name, ',', true);
        if($string === false){
            $string = $this->name;
        }
        $array = explode(' ', $string); 
        $lastname = str_replace(',', '', array_pop($array));
        return $lastname;
    }

	/**
	 * @return \WP_Term|null
	 */
    public function credential(){
    	if( $this->credential ){
    		return $this->credential;
	    }
	    if( $this->getTaxonomy('provider_info') ){
		    $this->credential = $this->getTaxonomy('provider_info')[0];
	    }else{
	    	return null;
	    }

	    return $this->credential;
    }

    /**
     * The conditions this provider treats
     * @return array
     */
    public function promotions() {
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Promotion::class);
    }

    /**
     * The conditions this provider treats
     * @return array
     */
    public function testimonials() {
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Testimonial::class);
    }

    /**
     * The conditions this provider treats
     * @return array
     */
    public function conditions() {
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Condition::class);
    }

    /**
     * The treatments this provider provides
     * @return array
     */
    public function events() {
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Event::class);
    }

    /**
     * The treatments this provider provides
     * @return array
     */
    public function treatments() {
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Treatment::class);
    }

    /**
     * The locations for this provider
     * @return array
     */
    public function locations() {
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Location::class);
    }

}
