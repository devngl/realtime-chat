<?php

namespace App\Http\Resources;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Conversation */
class Conversation extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'message'    => $this->message,
            'read'       => $this->read,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'sender_id' => $this->sender_id,
            'target_id' => $this->target_id,

            'sender_name' => $this->sender->name,
            'target_name' => $this->target->name,

            'is_my_message' => $this->sender->is(Auth::user()),
        ];
    }
}
