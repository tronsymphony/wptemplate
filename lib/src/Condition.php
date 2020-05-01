<?php namespace Urge;

use Urge\Abstracts\Post;

class Condition extends Post {

    protected $relations = [
        'events' => 'concern_events',
        'treatments' => 'concern_treatments',
        'locations' => 'concern_locations',
        'galleries' => 'concern_galleries',
        'promotions' => 'condition_promotions',
    ];

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

    public function __construct( $param ) {
        $post = get_post($param);
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink($this->post_id);
    }

    public function events(){
        $data = get_post_meta( $this->post_id, $this->relations['events'], true );
        return $this->buildRelationship($data, Event::class);
    }

    public function treatments(){
        $data = get_post_meta( $this->post_id, $this->relations['treatments'], true );
        return $this->buildRelationship($data, Treatment::class);
    }

    public function locations(){
        $data = get_post_meta( $this->post_id, $this->relations['locations'], true );
        return $this->buildRelationship($data, Location::class);
    }

    public function galleries(){
        $data = get_post_meta( $this->post_id, $this->relations['galleries'], true );
        return $this->buildRelationship($data, Gallery::class);
    }

    public function promotions(){
        $data = get_post_meta( $this->post_id, $this->relations['promotions'], true );
        return $this->buildRelationship($data, Promotion::class);
    }

}