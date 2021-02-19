<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Featureable extends Model
{
    use HasFactory;

    public $fillable = ['feature_id', 'featureable_type', 'featureable_id'];
}
