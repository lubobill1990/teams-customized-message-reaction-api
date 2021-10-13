<?php
namespace App\Events;

use App\Models\MessageReaction;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class MessageReactionChangedEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;
  public $type;

  public function __construct(MessageReactionChangeType $type, MessageReaction $messageReaction)
  {
      $this->message = $messageReaction->toArray();
      $this->type = $type->getValue();
  }

  public function broadcastOn()
  {
      return ['chat-channel_' . str_replace(':', '_', $this->message['chat_id'])];
  }

  public function broadcastAs()
  {
      return 'message-reaction-changed';
  }
}