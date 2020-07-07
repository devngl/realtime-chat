<?php

namespace App\Events;

use App\Conversation;
use Duijker\LaravelMercureBroadcaster\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

class MessageCreated implements ShouldBroadcast
{
    use Dispatchable;

    public Conversation $conversation;

    public function __construct(Conversation $conversation)
    {
        $this->conversation = $conversation;
    }

    public function broadcastOn()
    {
        $target_id = (int) $this->conversation->target_id;
        return new Channel("https://example.com/chat/users/{$target_id}/messages", true);
    }
}