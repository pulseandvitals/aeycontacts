<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'receiver_id',
        'sender_id',
        'message_subject',
        'isSeen',
        'timestamp_seen',
    ];
    public function user() {

        return $this->BelongsTo(User::class,'sender_id','id');

    }
    public function getReceiver() {

        return $this->BelongsTo(User::class,'receiver_id','id');

    }
}
