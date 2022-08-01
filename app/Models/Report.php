<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'report_users';
    protected $fillable = [
        'reason',
        'user_account_id',
        'user_reported_id'
    ];

    public function user() {

        return $this->BelongsTo(User::class,'profile_id','id');

    }
}
