<?php

namespace App\Libraries;

use Pusher\Pusher;

class Broadcasting
{
    /**
     * protect the broadcasting driver name.
     */
    protected $driver;

    /**
     * protect the broadcasting channel name.
     */
    protected $channel;

    /**
     * protect the broadcasting event name.
     */
    protected $event;

    /**
     * list broadcasting data resources.
     */
    protected $data;

    /**
     * instantiate the broadcasting class.
     * 
     * @return void
     */
    public function __construct($channel, $event, $data)
    {
        $this->channel = $channel;
        $this->event = $event;
        $this->data = $data;

        $this->driver = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            config('broadcasting.connections.pusher.options')
        );
    }

    /**
     * trigger the pusher broadcasting channel.
     * 
     * @return void
     */
    public function execute()
    {
        $this->driver->trigger(
            $this->channel,
            $this->event,
            $this->data,
        );  
    }
}