<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    public $fillable = ['Name', 'isPublic', 'duration', 'price'];

    public function subscription()
    {
        return $this->belongsTo('App\Models\Subscription');
    }
}
