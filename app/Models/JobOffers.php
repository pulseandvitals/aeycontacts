<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOffers extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_description',
        'company_name',
        'work_base',
        'field_work',
        'qualification',
        'user_id',
        'applicants_limit',
        'applicants_count',
        'isOpen'
    ];

    public function getCompanyUser() {

        return $this->BelongsTo(User::class,'user_id','id');

    }
}
