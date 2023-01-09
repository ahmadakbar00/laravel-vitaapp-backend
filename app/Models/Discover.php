<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discover extends Model
{
    use HasFactory;

    protected $table = 'master_discover';

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'img_url',
    ];
}
