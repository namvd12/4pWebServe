<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class NotificationSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
  
    public function __construct($message)
    {
        $this->message = $message;
    }
  
    public function broadcastOn()
    {
        if(env("APP_ENV") == "product")
        {
            return ['notifications4p'];
        }
        else if(env("APP_ENV") == "dev2")
        {
            return ['notificationsDev2'];
        }
        else if(env("APP_ENV") == "dev1")
        {
            return ['notificationsDev1'];
        }
        else
        {
            return ['notificationsDev'];
        }
    }
  
    public function broadcastAs()
    {
        return 'message';
    }
}