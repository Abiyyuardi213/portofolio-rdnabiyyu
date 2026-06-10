<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'role',
        'bio',
        'photo',
        'phone',
        'whatsapp',
        'email',
        'location',
        'github',
        'linkedin',
        'instagram',
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(ProfilePhoto::class);
    }
}
