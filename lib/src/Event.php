<?php namespace Urge;

use Carbon\Carbon;
use Urge\Abstracts\Post;

class Event extends Post {

    /**
     * @var
     */
    public $notify;

    /**
     * @var string The address of the event
     */
    public $address;

    /**
     * @var Carbon
     */
    public $start;

    /**
     * @var Carbon
     */
    public $end;

    public $map_for;

    protected $relations = [
        'providers' => 'event_providers',
        'treatments' => 'event_treatments',
        'conditions' => 'event_conditions',
        'locations' => 'concern_locations',
    ];

    public function __construct( $param ) {
        $post = get_post($param);
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink($this->post_id);

        $_event = 'event_';
        $this->notify = get_post_meta( $this->post_id, $_event . 'email_to', true );
        $this->address = get_post_meta( $this->post_id, $_event . 'address', true );

        $start_date = get_post_meta( $this->post_id, $_event . 'start_date', true );
        $start_time = get_post_meta( $this->post_id, $_event . 'start_time', true );
        $end_date = get_post_meta( $this->post_id, $_event . 'end_date', true );
        $end_time = get_post_meta( $this->post_id, $_event . 'end_time', true );

        $_start_date = Carbon::parse($start_date)->format('Y-m-d');
        $_start_time = Carbon::parse($start_time)->format('H:m:s a');
        $this->start = Carbon::parse($_start_date . ' ' . $_start_time);

        $_end_date = Carbon::parse($end_date)->format('Y-m-d');
        $_end_time = Carbon::parse($end_time)->format('H:i:s a'); 
        $this->end = Carbon::parse($_end_date . ' ' . $_end_time);
        $this->map_for = get_post_meta($this->post_id, $_event . 'display_map', true);
    }

    public function providers(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Provider::class);
    }

    public function treatments(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Treatment::class);
    }

    public function conditions(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Condition::class);
    }

    public function locations(){
        $data = $this->prepareMetaData(__FUNCTION__);
        return $this->buildRelationship($data, Location::class);
    }

}
