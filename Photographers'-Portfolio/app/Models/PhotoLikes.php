<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PhotoLikes extends Pivot
{
    use HasFactory;

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
    protected $primaryKey = 'photo_like_id';




}
