<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowerList extends Model
{
    use HasFactory;

    /**
     * Setting table name
     */
    protected $table = 'follower_list';

    /**
     * Setting primary key
     * 
     * @var int
     */
    protected $primaryKey = 'follow_id';

    /**
     * Excluding timestamps columns
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'follower_uid',
        'following_uid',
    ];
}
