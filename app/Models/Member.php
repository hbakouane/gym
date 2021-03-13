<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'email',
        'phone',
        'cne',
        'photo',
        'address',
        'city',
        'zip',
        'country',
        'subscription_id',
        'project_id',
        'note',
        'country',
        'started_at',
        'ended_at',
        'status'
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function subscription()
    {
        return $this->belongsTo('App\Models\Subscription');
    }

    public function payment()
    {
        return $this->belongsToMany('App\Models\Payment');
    }
}
