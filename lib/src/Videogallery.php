<?php
namespace Urge;

use Urge\Abstracts\Post;

class VideoGallery extends Post {

    public $post_id;

    public $name;

    public $permalink;

    public $relations = [
        'providers' => 'videogallery_providers',
        'events' => 'videogallery_events',
        'conditions' => 'videogallery_concerns',
        'locations' => 'videogallery_locations',
        'galleries' => 'videogallery_galleries',
        'testimonials' => 'videogallery_testimonials',
        'promotions' => 'videogallery_promotions',
        'videogallery' => 'videogallery_videogallery',
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
