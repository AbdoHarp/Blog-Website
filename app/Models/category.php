<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $table = "categorie";

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'mate_title',
        'mate_description',
        'mate_keyword',
        'navbar_status',
        'status',
        'created_by',
    ];


    public function posts()
    {
        return $this->hasMany(post::class, 'category_id', 'id');
    }
}
