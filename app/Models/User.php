<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use JeffGreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;


class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable , TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const ROLE_USER     = 'USER';
    public const ROLE_ADMIN    = 'ADMIN';
    public const ROLE_PROVIDER = 'PROVIDER';
    public const ROLE_DEFAULT  = 'USER';


    public const ROLES = [
        self::ROLE_USER,
        self::ROLE_ADMIN,
        self::ROLE_PROVIDER
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(): bool {
        return $this->isAdmin() || $this->isProvider() || $this->isUser();
    }
    public function isAdmin() : bool {
        return $this->role === self::ROLE_ADMIN;
    }
    public function isProvider () : bool {
        return $this->role === self::ROLE_PROVIDER;
    }
    public function isUser () : bool {
        return $this->role === self::ROLE_USER;
    }
}
