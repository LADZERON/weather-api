<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use Notifiable;

    public const EMAIL_ATTRIBUTE = 'email';
    public const PASSWORD_ATTRIBUTE = 'password';
    public const NAME_ATTRIBUTE = 'name';
    public const REMEMBER_TOKEN_ATTRIBUTE = 'remember_token';
    public const EMAIL_VERIFIED_AT_ATTRIBUTE = 'email_verified_at';
    public const PASSWORD_CONFIRMATION_ATTRIBUTE = 'password_confirmation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME_ATTRIBUTE,
        self::EMAIL_ATTRIBUTE,
        self::PASSWORD_ATTRIBUTE,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD_ATTRIBUTE,
        self::REMEMBER_TOKEN_ATTRIBUTE,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::EMAIL_VERIFIED_AT_ATTRIBUTE => 'datetime',
        self::PASSWORD_ATTRIBUTE => 'hashed',
    ];

    public function role(): HasOneThrough
    {
        return $this->hasOneThrough(Role::class, 'model_has_roles', 'model_id', 'id', 'id', 'role_id');
    }
}
