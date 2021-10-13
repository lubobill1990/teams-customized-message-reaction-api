<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "emoji_url",
        "emoji_id",
        "user_id",
        "message_id",
        "chat_id",
    ];
}
