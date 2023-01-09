<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPersonal extends Model
{
    use HasFactory;

    protected $table = 'master_data';
    protected $fillable = [
        'id_user',
        'berat',
        'tinggi',
        'imt',
        'status',
    ];
}
