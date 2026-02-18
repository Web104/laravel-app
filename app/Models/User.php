<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasUuids, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role',
    ];

    protected $hidden = [
        'password', //On cache toujours le mot de passe dans le JSON
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed', // Hashage automatique
        ];
    }
}
