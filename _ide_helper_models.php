<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $contacts
 * @property-read int|null $contacts_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Conversation
 *
 * @property int $id
 * @property int $sender_id
 * @property int $target_id
 * @property string $message
 * @property bool $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $sender
 * @property-read \App\User $target
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUpdatedAt($value)
 */
	final class Conversation extends \Eloquent {}
}

namespace App{
/**
 * App\UserContact
 *
 * @property int $id
 * @property int $user_id
 * @property int $contact_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContact whereUserId($value)
 */
	final class UserContact extends \Eloquent {}
}

