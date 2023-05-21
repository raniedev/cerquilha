<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteStyle extends Model
{
    use HasFactory;

    protected $fillable = [
        'font_size',
        'main_color',
        'theme',
        'user_id'
    ];
}
