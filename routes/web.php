<?php

use App\Events\MessageReactionChangedEvent;
use App\Events\MessageReactionChangeType;
use App\Models\MessageReaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function () {
    echo <<<EOF
    <!DOCTYPE html>
    <head>
      <title>Pusher Test</title>
      <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <script>
    
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('4411f993f69f6b2f9a50', {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('general-channel');
        channel.bind('message-reaction-changed', function(data) {
          alert(JSON.stringify(data));
        });
      </script>
    </head>
    <body>
      <h1>Pusher Test</h1>
      <p>
        Try publishing an event to channel <code>my-channel</code>
        with event name <code>message-reaction-changed</code>.
      </p>
    </body>
    EOF
;
});


Route::get('/send-notification', function() {
    $messageReaction = MessageReaction::first();
    event(new MessageReactionChangedEvent(MessageReactionChangeType::CREATE(), $messageReaction));
});
