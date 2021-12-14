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

    /**
     * Setting primary key
     * 
     * @var int
     */
    protected $primaryKey = 'u_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'profile_image',
        'bio',
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
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the photos of the user
     */
    public function photos(){
        return $this->hasMany(Photos::class,'u_id'); 
    }

    /**
     * Get the blogs of the user
     */
    public function blogs(){
        return $this->hasMany(Blogs::class,'u_id'); 
    }


    public function userLikes(){
        return $this->belongstoMany(User::class)->using(PhotoLikes::class);
    }

    public function userComments(){
        return $this->belongstoMany(User::class)->using(PhotoComments::class);
    }
}
