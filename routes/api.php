<?php

use App\Http\Controllers\API\GetMessagesWithContact;
use App\Http\Controllers\API\SendMessage;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(static function () {
    Route::get('/messages/{contact}', GetMessagesWithContact::class);
    Route::put('/messages/{contact}', SendMessage::class);
});
