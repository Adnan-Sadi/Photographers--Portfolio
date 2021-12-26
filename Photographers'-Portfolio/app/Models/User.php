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
    protected $user;


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


    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            $user->profile()->create([
                'title' => $user->full_name
            ]);


        });

    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }


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

    /**
     * Get all the photos liked by the user
     */
    public function userLikes(){
        return $this->belongstoMany(Photos::class)->using(PhotoLikes::class);
    }

    /**
     * Get all the photos commented on by the user
     */
    public function userComments(){
        return $this->belongstoMany(Photos::class)->using(PhotoComments::class);
    }

    /**
     * Get all the blogs liked by the user
     */
    public function blogLikes(){
        return $this->belongstoMany(Blogs::class)->using(BlogLikes::class);
    }




    /**
     * Get all the blogs commented on by the user
     */
    public function blogComments(){
        return $this->belongstoMany(Blogs::class)->using(BlogComments::class);
    }
}
