<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the parent commentable model (post or video).
     */
    protected $fillable = [
        'commentable_type',
        'commentable_id	',
        'body',
    ];
    
    public function commentable()
    {
        return $this->morphTo();
    }

   
}
 