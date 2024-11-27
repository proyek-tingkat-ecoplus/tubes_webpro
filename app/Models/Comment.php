<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
        'parent_id',
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

    public function form(){
        return $this->belongsTo(Forum::class,'forum_id','id');
    }

    public function parent(){
        return $this->belongsTo(Comment::class,'parent_id','id');
    }



}
