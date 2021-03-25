<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Model
{
    use HasFactory, HasRoles;

    public $fillable = [
        'name',
        'email',
        'phone',
        'cne',
        'photo',
        'address',
        'city',
        'country',
        'password',
        'project_id'
    ];
}
