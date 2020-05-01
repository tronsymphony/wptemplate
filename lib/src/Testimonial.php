<?php namespace Urge;

use Urge\Abstracts\Post;

class Testimonial extends Post {

    protected $relations = [
        'providers' => 'testimonial_providers',
        'treatments' => 'testimonial_treatments',
        'locations' => 'testimonial_locations',
        'galleries' => 'testimonial_galleries'
    ];

    public function __construct( $param ) {
        $post = get_post($param);
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink($this->post_id);
        $this->content = $post->post_content;
        $this->date = $post->post_date;
    }

    public function providers(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Provider::class);
    }

    public function treatments(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Treatment::class);
    }

    public function locations(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Location::class);
    }

    public function galleries(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Gallery::class);
    }
}
