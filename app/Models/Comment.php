<?php

namespace App\Models;

use App\Models\User;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'user_id',
        'comment_body'
    ];

    public function post()
    {
        return $this->belongsTo(post::class, "post_id ", "id");
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id ', 'id');
    }
}
