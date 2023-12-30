<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ss', function () {
    $options = array(
        'cluster' => 'eu',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        config()->get('broadcasting.connections.pusher.key'),
        config()->get('broadcasting.connections.pusher.secret'),
        config()->get('broadcasting.connections.pusher.app_id'),
        $options
      );
    
      $data['message'] = 'hello world';
      $pusher->trigger('my-channel', 'my-event', $data);
    return 123;
});
