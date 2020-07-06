<?php

namespace App\Http\Controllers\API;

use App\Conversation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SendMessage extends ApiController
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'target'  => 'required|integer',
            'message' => 'required|string',
        ]);

        Conversation::create([
            'sender_id'  => $this->user->id,
            'target_id'  => $request->get('target'),
            'message'    => $request->get('message'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return new JsonResponse(null, JsonResponse::HTTP_CREATED);
    }
}
