<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressDetails extends Model
{
    protected $fillable = [
        'city',
        'state',
        'zip',
        'country',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function userDetails()
    {
        return $this->belongsTo(UserDetails::class, 'address_id', 'id');
    }
}
