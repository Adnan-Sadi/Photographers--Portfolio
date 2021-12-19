<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    use HasFactory;

    /**
     * Setting table name
     */
    protected $table = 'photos';

    /**
     * Setting primary key
     */
    protected $primaryKey = 'p_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'u_id',
        'caption',
        'photo_path',
    ];

    /**
     * Get user that owns the photo
     */
    public function user(){
        return $this->belongsTo(User::class,'u_id'); 
    }

    /**
     * Get all users who liked the photo
     */
    public function photoLikes(){
        return $this->belongstoMany(User::class)->using(PhotoLikes::class);
    }

    /**
     * Get all users who commented on the photo
     */
    public function photoComments(){
        return $this->belongstoMany(User::class)->using(PhotoComments::class);
    }
}
