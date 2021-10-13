<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_reactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('user_id', 100);
            $table->string('chat_id', 100);
            $table->string('message_id', 100);
            $table->string('emoji_id', 100);
            $table->string('emoji_url', 256);
            $table->index('user_id');
            $table->index('chat_id');
            $table->unique(['message_id', 'user_id', 'chat_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_reactions');
    }
}
