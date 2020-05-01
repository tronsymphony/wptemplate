<?php namespace Urge;

use Urge\Abstracts\Post;

class Location extends Post {

    /**
     * @var integer
     */
    public $post_id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $permalink;

    protected $relations = [
        'providers' => 'location_providers',
        'events' => 'location_events',
        'treatments' => 'location_treatments',
        'conditions' => 'location_conditions',
        'promotions' => 'location_promotions',
    ];

    public function __construct( $param ) {
        $post = get_post($param);
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink($this->post_id);
    }

    public function providers(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Provider::class);
    }

    public function events(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Event::class);
    }

    public function treatments(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Treatment::class);
    }

    public function conditions(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Condition::class);
    }

    public function promotions(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Promotion::class);
    }

}
