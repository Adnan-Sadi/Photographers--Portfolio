<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPhotos extends Model
{
    use HasFactory;

    /**
     * Setting table name
     */
    protected $table = 'blog_photos';

    /**
     * Setting primary key
     * 
     * @var int
     */
    protected $primaryKey = 'blog_photo_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'b_id',
        'path',
    ];

    /**
     * Get the blog that contains the photo
     */
    public function blogs(){
        return $this->belongsTo(Blogs::class,'b_id'); 
    }
}
