<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'master_article';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'img_url',
    ];

    
}
