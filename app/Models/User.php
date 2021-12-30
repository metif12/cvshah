<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const AUTHORIZATION_RESENDING_PRIED = 120;
    const AUTHORIZATION_REFRESHING_PRIED = 600;

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'birthday' => 'date',
        'mobile_verified_at' => 'datetime',
    ];

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }

    public function getAuthorizationCodeAttribute()
    {
        $key = "users.{$this['id']}.authorization_code";

        return cache()->remember($key, self::AUTHORIZATION_REFRESHING_PRIED, function () {
            return random_int(100000, 999999);
        });
    }

    public function getLastAuthorizationDateTimeAttribute()
    {
        $key = "users.{$this['id']}.last_authorization_date_time";

        return cache()->get($key);
    }

    public function setLastAuthorizationDateTimeAttribute($value)
    {
        $key = "users.{$this['id']}.last_authorization_date_time";

        cache()->put($key, $value, self::AUTHORIZATION_RESENDING_PRIED);
    }
}
