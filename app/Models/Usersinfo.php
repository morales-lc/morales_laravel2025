<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Usersinfo extends Model
{
    //
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
}
