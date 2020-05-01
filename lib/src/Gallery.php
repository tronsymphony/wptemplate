<?php namespace Urge;

use Urge\Abstracts\Post;

class Gallery extends Post {

    protected $relations = [
        'treatments' => 'gallery_treatments',
        'conditions' => 'gallery_conditions'
    ];

    public function __construct( $param ) {
        $post = get_post( $param );
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink( $this->post_id );
    }

    public function treatments(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Treatment::class);
    }

    public function conditions(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Condition::class);
    }
}