<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $fillable = ['name', 'price', 'duration', 'created_by'];

    public function features()
    {
        return $this->morphToMany('App\Models\Feature', 'featureable')->withTimestamps();
    }
}
