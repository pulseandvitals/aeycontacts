<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    // protected $primaryKey = 'profile_id';
    protected $fillable = [
        'profession',
        'years_of_exp',
        'contact_no',
        'city_address',
        'work_base',
        'profile_id',
        'work_objective',
        'previous_work',
    ];
    public function user() {

        return $this->BelongsTo(User::class,'profile_id','id');

    }

}


