<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoComments extends Model
{
    use HasFactory;

    /**
     * Setting table name
     */
    protected $table = 'photo_comments';
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
    protected $primaryKey = 'photo_comment_id';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'u_id',
        'p_id',
        'text',
    ];
}
