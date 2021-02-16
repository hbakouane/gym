<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $fillable = ['name', 'email', 'phone', 'address', 'city', 'zip', 'country', 'subscription_id', 'country', 'started_at', 'ended_at', 'status'];
}
