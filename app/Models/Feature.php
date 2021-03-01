<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    public $fillable = ['name', 'description', 'project_id'];

    public function subscriptions()
    {
        return $this->morphedByMany('App\Models\Subscription', 'featureable')->withTimestamps();
    }
}
