<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model representing an uploaded file in the system.
 *
 * Properties:
 * - original_filename: The original name of the uploaded file.
 * - filename: The hashed/stored filename on disk.
 * - type: The MIME type of the file.
 * - uploaded_by: The user ID (foreign key) of the uploader.
 *
 * Relationships:
 * - user(): Belongs to the Usersinfo model (the uploader).
 *
 * Usage:
 * - Used for file management (upload, update, delete, download).
 * - Provides access to the uploading user's info via the user() relationship.
 */
class Upload extends Model
{
    use HasFactory;

    protected $table = 'uploads';

    protected $fillable = [
        'original_filename',
        'filename',
        'type',
        'uploaded_by',
    ];

    // Relationship: Upload belongs to a user
    public function user()
    {
        return $this->belongsTo(Usersinfo::class, 'uploaded_by');
    }
}
