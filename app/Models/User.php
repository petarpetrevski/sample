<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

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
        'email_verified_at' => 'datetime',
    ];

    // mutator to hash password, eloquent will auto check for a method with this specific name
    public function setPasswordAttribute($password) { // whenever we set a user password, it will run through this method and mutate the attribute

        $this->attributes['password'] = bcrypt($password);

    }

    // the inverse to mutator - accessor:

    // public function getUsernameAttribute($username) {

    //     return ucwords($username); // so whenever we echo out $user->username === 'petarp' it will render out as 'Petarp'

    // }


    public function posts() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Post::class);
    }
}
