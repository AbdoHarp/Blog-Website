<?php

namespace App\Models;

use App\Models\category;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;


    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'name',
        "slug",
        "description",
        "yt_iframe",
        "meta_title",
        "meta_description",
        "meta_keyword",
        "status",
        "created_by"
    ];

    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
