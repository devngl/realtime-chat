<?php

namespace App;

use App\Events\MessageCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Conversation extends Model
{
    public const TABLE_NAME = 'conversations';

    protected $table = self::TABLE_NAME;
    protected $fillable = ['id', 'sender_id', 'target_id', 'message', 'read', 'created_at', 'updated_at'];

    protected $casts = ['read' => 'boolean'];

    protected static function boot()
    {
        parent::boot();

        static::created(fn(self $conversation) => MessageCreated::broadcast($conversation));
    }

    public function sender():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function target():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}