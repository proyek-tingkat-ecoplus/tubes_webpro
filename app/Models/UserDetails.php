<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'nik',
        'city',
        'state',
        'zip',
        'country',
        'address_id',
        'user_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function address(){

        return $this->hasOne(AddressDetails::class,'id','address_id');
    }
}
