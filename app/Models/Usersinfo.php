<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * Model representing a user in the system (usersinfo table).
 *
 * Properties:
 * - id: UUID primary key for the user.
 * - first_name: User's first name.
 * - last_name: User's last name.
 * - sex: User's gender (Male/Female).
 * - birthday: User's date of birth.
 * - username: Unique username for login.
 * - email: Unique email address.
 * - password: Hashed password.
 * - user_type: Role or type of user (e.g., admin, regular).
 *
 * Traits:
 * - HasUuids: Uses UUIDs for primary keys.
 * - HasFactory: Enables model factories for testing/seeding.
 * - Notifiable: Allows sending notifications to the user.
 *
 * Usage:
 * - Used for authentication, registration, and user management.
 * - Can receive notifications (email verification, password reset, etc.).
 */
class Usersinfo extends Model
{
    use HasUuids;
    use HasFactory;
    use Notifiable;
    protected $table = 'usersinfo';
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'sex',
        'birthday',
        'username',
        'email',
        'password',
        'user_type',
    ];
    public $incrementing = false;
    protected $keyType = 'string';
}
