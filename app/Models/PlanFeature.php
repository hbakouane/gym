<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'number' /* Will be a boolean as a string i.e 'true' OR a number which will the max number of a feature */,
        'plan_id'
    ];
}
