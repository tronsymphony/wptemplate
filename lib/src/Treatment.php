<?php
namespace Urge;

use Urge\Abstracts\Post;

class Treatment extends Post {

    public $post_id;

    public $name;

    public $permalink;

    public $relations = [
        'providers' => 'treatment_providers',
        'events' => 'treatment_events',
        'conditions' => 'treatment_concerns',
        'locations' => 'treatment_locations',
        'galleries' => 'treatment_galleries',
        'testimonials' => 'treatment_testimonials',
        'promotions' => 'treatment_promotions',
        'videogallery' => 'treatment_videogallery',
    ];

    public function __construct($param){
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

    public function conditions(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Condition::class);
    }

    public function locations(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Location::class);
    }

    public function galleries(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Gallery::class);
    }

    public function testimonials(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Testimonial::class);
    }

    public function promotions(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Promotion::class);
    }

    public function videogallery(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Promotion::class);
    }

}
