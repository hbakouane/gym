<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $guard = 'staff';

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
        'project_id',
        'role_id'
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
