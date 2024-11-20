<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'description',
        'permissions',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // protected $casts = [
    //     'permissions' => 'array',
    // ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}
