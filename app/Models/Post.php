<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    // protected $fillable = ['title', 'excerpt', 'body'];


    // If not using :slug in routes:

    // public function getRouteKeyName() {
    //     return 'slug';
    // }

    protected $with = ['category', 'author'];

    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id'); // specify that the foreign key is user_id, since it assumes that it will be author_id
    }
}
