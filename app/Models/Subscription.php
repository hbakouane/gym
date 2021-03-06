<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $fillable = ['name', 'price', 'duration', 'project_id', 'created_by'];

    public function features()
    {
        return $this->morphToMany('App\Models\Feature', 'featureable')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
