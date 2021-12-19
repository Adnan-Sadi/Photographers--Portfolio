<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    /**
     * Setting table name
     */
    protected $table = 'blogs';
    /**
     * Setting primary key
     * 
     * @var int
     */
    protected $primaryKey = 'b_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'u_id',
        'title',
        'text_writings',
        'cover_photo',
    ];

    /**
     * Get user that owns the blog
     */
    public function user(){
        return $this->belongsTo(User::class,'u_id'); 
    }

    /**
     * Get all users who liked the blog
     */
    public function blogLikes(){
        return $this->belongstoMany(User::class)->using(BlogLikes::class);
    }

    /**
     * Get all users who commented on the blog
     */
    public function blogComments(){
        return $this->belongstoMany(User::class)->using(BlogComments::class);
    }

    /**
     * Get all the photos of the blog
     */
    public function blogPhotos(){
        return $this->hasMany(BlogPhotos::class,'b_id'); 
    }
}
