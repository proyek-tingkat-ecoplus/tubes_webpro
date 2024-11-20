<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        "name",
        "description",
        "slug",
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    public function forums(){
        return $this->belongsToMany(Forum::class,'category_forum','category_id','forum_id');
    }
}
