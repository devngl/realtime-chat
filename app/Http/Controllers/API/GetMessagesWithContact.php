<?php

namespace App\Http\Controllers\API;

use App\Conversation;
use App\Http\Resources\ConversationCollection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class GetMessagesWithContact extends ApiController
{
    public function __invoke(Request $request, int $contactId)
    {
        $messages = Conversation::where(function($query) use ($contactId) {
            $query->where('sender_id', $this->user->id)->where('target_id', $contactId);
        })->orWhere(function ($query) use ($contactId) {
            $query->where('target_id', $this->user->id)->where('sender_id', $contactId);
        })
            ->orderByDesc('created_at')
            ->get();

        return new ConversationCollection($messages);
    }
}