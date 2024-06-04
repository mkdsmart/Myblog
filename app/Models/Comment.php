<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'message', 'like', 'post_id'];

    public function postcomment(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
