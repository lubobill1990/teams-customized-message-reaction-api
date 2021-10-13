<?php

namespace App\Http\Controllers;

use App\Events\MessageReactionChangedEvent;
use App\Events\MessageReactionChangeType;
use App\Models\MessageReaction;
use Illuminate\Http\Request;

class MessageReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'chat_id' => 'required|max:100',
            'message_id' => 'array',
        ]);
        $reactions = MessageReaction::whereChatId($validated['chat_id'])->get();

        return $reactions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|max:100',
            'chat_id' => 'required|max:100',
            'message_id' => 'required|max:100',
            'emoji_url' => 'required|max:256',
            'emoji_id' => 'required|max:100',
        ]);
        $reaction = MessageReaction::whereUserId($validated['user_id'])
            ->whereChatId($validated['chat_id'])
            ->whereMessageId($validated['message_id'])
            ->first();
        if ($reaction) {
            $reaction->fill($validated);
        } else {
            $reaction = MessageReaction::create($validated);
        }
        
        $reaction->save();
        event(new MessageReactionChangedEvent(MessageReactionChangeType::CREATE(), $reaction));

        return $reaction->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MessageReaction  $messageReaction
     * @return \Illuminate\Http\Response
     */
    public function show(MessageReaction $messageReaction)
    {
        return $messageReaction->toArray();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MessageReaction  $messageReaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageReaction $messageReaction)
    {
        $validated = $request->validate([
            'user_id' => 'required|max:100',
            'chat_id' => 'required|max:100',
            'message_id' => 'required|max:100',
            'emoji_url' => 'required|max:256',
            'emoji_id' => 'required|max:100',
        ]);
        $messageReaction->fill($validated);
        $messageReaction->save();
        
        event(new MessageReactionChangedEvent(MessageReactionChangeType::UPDATE(), $messageReaction));

        return $messageReaction->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MessageReaction  $messageReaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageReaction $messageReaction)
    {
        $messageReaction->delete();
        event(new MessageReactionChangedEvent(MessageReactionChangeType::DELETE(), $messageReaction));

        return $messageReaction->toArray();
    }
}
