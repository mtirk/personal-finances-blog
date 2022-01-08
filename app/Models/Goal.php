<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Goal extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['goal', 'slug', 'done', 'description', 'finish_date', 'user_id'];

    protected $casts = ['done' => 'boolean'];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'goal' //to grab a title and make a slug out of it
            ]
        ];
    }
}
