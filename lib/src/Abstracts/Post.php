<?php namespace Urge\Abstracts;

abstract class Post {

    public $post_id;

    public $name;

    public $permalink;

    public $content;

    public $date;

    protected $relations = [];

    public function getMeta($key){
    	return get_post_meta($this->post_id, $key, true);
    }

	public function getTaxonomy($key){
		return wp_get_post_terms($this->post_id, $key, true);
	}

    /**
     * @param $key
     *
     * @return array
     */
    protected function prepareMetaData($key){
        $data = get_post_meta( $this->post_id, $this->relations[$key], true );
        if( ! $data ){
            return [];
        }
        return $data;
    }

    /**
     * @param $data array
     * @param $class string
     *
     * @return array
     */
    public function buildRelationship($data, $class){
        $_result = [];
        if( empty($data) ){
            return [];
        }
        foreach ( $data as $id) {
            $_result[] = new $class( $id );
        }
        return $_result;
    }
}
