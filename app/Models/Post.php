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

    public function scopeFilter($query, array $filters) {
        // if (isset($filters['search'])) {
        //     $query
        //         ->where('title', 'like', '%' . request('search') . '%')
        //         ->orWhere('body', 'like', '%' . request('search') . '%');
        // }


        // this introduced a bug after I combined the search and category queries:

        // $query->when($filters['search'] ?? false, fn($query, $search) =>
        //     $query
        //         ->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%'));

        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            )
        );


        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author() {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, 'user_id'); // specify that the foreign key is user_id, since it assumes that it will be author_id
    }
}
