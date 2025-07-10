<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
     
        'role_id',
        'user_type',
        'email',
        'password',
        'name',
        'user_slug',
        'user_description',
        'user_image',
        'user_status'
     
    ];

    // ... (rest of your model)
    //   public function userArticles() // Renamed the relationship here
    // {
    //     return $this->hasMany(News::class); // Still links to the News model
    // }
     public function userArticles()
    {
        // Tell Laravel that the foreign key in the 'news' table is 'author_id', not 'user_id'
        return $this->hasMany(News::class, 'author_id');
    }
     public function news()
    {
        return $this->hasMany(News::class, 'author_id');
    }
}