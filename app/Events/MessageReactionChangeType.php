<?php
namespace App\Events;

final class MessageReactionChangeType extends \MyCLabs\Enum\Enum {
    private const UPDATE = 'update';
    private const DELETE = 'delete';
    private const CREATE = 'create';
}