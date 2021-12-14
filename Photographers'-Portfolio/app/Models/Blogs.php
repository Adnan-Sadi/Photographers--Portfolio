<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

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
}
