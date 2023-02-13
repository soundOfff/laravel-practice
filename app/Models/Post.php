<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'body', 'views_count', 'slug', 'category_id', 'user_id', 'thumbnail'];
    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function scopeFilter($query, array $filters)
    {
        // Tengo que traer todos las subscripciones del usuario auth
        // y matchear la author_id de la subscripcion con la de cada post

        $id_authorized = auth()->user()->id;

        // $subs = Subscription::where('user_id', $id_authorized)->first();


        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->where(
                    fn ($query) =>
                    $query->where('title', 'like', '%' . $search . '%')
                        ->orWhere('body', 'like', '%' . $search . '%')
                )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) =>
        $query->whereHas('category', fn ($query) =>
        $query->where('slug', $category)));
        // $query
        //     ->whereExists(fn ($query) =>
        //     $query
        //         ->from('categories'))
        //     ->whereColumn('categories.id', 'posts.category_id')
        //     ->where('categories.slug', $category));

        $query->when($filters['author'] ?? false, fn ($query, $author) =>
        $query->whereHas('author', fn ($query) =>
        $query->where('username', $author)));
    }
}
