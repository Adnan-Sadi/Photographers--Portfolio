<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;

    /**
     * Setting table name
     */
    protected $table = 'blog_comments';

     /**
     * Indicates that the pivot model has an auto-incrementing primary key
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Setting primary key
     * 
     * @var int
     */
    protected $primaryKey = 'blog_comment_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'u_id',
        'b_id',
        'text',
    ];
}
