<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StickyNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_title', 
        'card_subtitle',
        'card_body',
        'card_link',
        'card_another_link',
    ];
}
