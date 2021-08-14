<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public $fillable = ['name', 'permissions','project_id'];

    public function staff()
    {
        return $this->hasOne('App\Models\Staff');
    }
}
