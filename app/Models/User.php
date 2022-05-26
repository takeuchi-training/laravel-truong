<?php

namespace App\Models;

use App\Casts\Json;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function Illuminate\Events\queueable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected static function booted()
    {
        // static::addGlobalScope('test', function (Builder $builder) {
        //     $builder->where('id', '=', 9);
        // });

        // static::created(queueable(function($user) {
        //     $user->name = "hacked";
        //     $user->save();
        // }));
    }

    public function scopeJustCreated($query) {
        $query->where('created_at', '>=', now()->subHours(9));
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function getTestAttribute() {
        return "Contact me at: " . substr($this->email, 0, strpos($this->email, "@"));
    }

    public function getEmailAttribute($value) {
        return strtolower($value);
    }

    public function setNameAttribute($value) {
        return $this->attributes['name'] = strtoupper($value);
    }

    public function posts() {
        return $this->hasMany(BlogPost::class);
    }
    
}
