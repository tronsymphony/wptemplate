<?php namespace Urge;

use Carbon\Carbon;
use Urge\Abstracts\Post;

class Promotion extends Post {

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

    protected $relations = [
        'providers' => 'promotion_providers',
        'conditions' => 'promotion_conditions',
        'locations' => 'promotion_locations',
        'testimonials' => 'promotion_testimonials',
    ];

    public function __construct( $param ) {
        $post = get_post($param);
        $this->post_id = $param;
        $this->name = $post->post_title;
        $this->permalink = get_permalink($this->post_id);

        $_event = 'promotion_';
        $this->notify = get_post_meta( $this->post_id, $_event . 'email_to', true );
        $this->address = get_post_meta( $this->post_id, $_event . 'address', true );

        $start_date = get_post_meta( $this->post_id, $_event . 'start_date', true );
        $start_time = get_post_meta( $this->post_id, $_event . 'start_time', true );
        $end_date = get_post_meta( $this->post_id, $_event . 'end_date', true );
        $end_time = get_post_meta( $this->post_id, $_event . 'end_time', true );

        //$this->start = Carbon::parse(Carbon::parse($start_date)->format('Y-m-d') . ' ' . Carbon::parse($start_time)->format('h:i:s'));
        //$this->end = Carbon::parse(Carbon::parse($end_date)->format('Y-m-d') . ' ' . Carbon::parse($end_time)->format('h:i:s'));
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
