<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'housing', 
        'income',
        'transportation', 
        'food', 
        'utilities', 
        'clothing',
        'healthcare',
        'insurance',
        'household_supplies',
        'personal',
        'debt',
        'retirement',
        'education',
        'savings',
        'gifts',
        'entertainment',
        'unexpected',
        'year',
        'month_id',
        'user_id'        
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function month() 
    {
        return $this->belongsTo(Month::class);
    }
}
