<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'attachment',
        'delivery_time',
        'start_date',
        'end_date',
        'status',
        'approved_at',
        'rejected_at',
        'approved_by',
        'rejected_by',
        'approved_reason',
        'rejected_reason'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function rejected_by()
    {
        return $this->belongsTo(User::class, 'rejected_by', 'id');
    }


}
