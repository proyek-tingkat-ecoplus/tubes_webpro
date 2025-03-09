<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
        "user_id",
        "name",
        "description",
        "slug",
        'guest_author'
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, "forum_id", "id");
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, "category_forum", "forum_id", "category_id");
    }
}
