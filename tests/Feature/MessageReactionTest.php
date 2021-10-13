<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageReactionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->post('/message-reactions', [
            "emoji_url" => "https://emojis.slackmojis.com/emojis/images/1597609813/10031/60fps_parrot.gif?1597609813",
            "emoji_id" => "60fps_parrot",
            "user_id" => "aa2a7b29-715b-401c-aa01-d0df2b8a08b5",
            "message_id" => "1634025448539",
            "chat_id" => "19:7968c7b8-39f2-4f20-99a1-17681815d5f0_aa2a7b29-715b-401c-aa01-d0df2b8a08b5"
        ]);

        $response->assertStatus(200);
    }

    public function test_show() {
        $response = $this->get('/message-reactions/1');

        $response->assertStatus(200);
    }

    public function test_index() {
        $response = $this->get('/message-reactions?chat_id=wef');

        $response->assertStatus(200);
    }

    public function test_delete() {
        
        $response = $this->delete('/message-reactions/1');

        $response->assertStatus(200);
    }
}
