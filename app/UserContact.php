<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

final class UserContact extends Model
{
    public const TABLE_NAME = 'user_contacts';

    protected $table = self::TABLE_NAME;
    protected $fillable = ['id', 'user_id', 'contact_id', 'created_at', 'updated_at'];
}