<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    /**
     * Setting primary key
     */
    protected $primaryKey = 'p_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'caption',
        'photo_path',
    ];

    /**
     * Get user that owns the photo
     */
    public function user(){
        return $this->belongsTo(User::class,'u_id'); 
    }

    public function photoLikes(){
        return $this->belongstoMany(User::class)->using(PhotoLikes::class);
    }

    public function photoComments(){
        return $this->belongstoMany(User::class)->using(PhotoComments::class);
    }
}
