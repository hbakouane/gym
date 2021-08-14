<?php

namespace App\Models;

use App\Scopes\WhereProjectScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public static $prefix;

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
        return $this->morphOne('App\Models\Payment', 'payable');
    }

    public function credit()
    {
        return $this->morphOne('App\Models\Credit', 'creditable');
    }

    public function membership()
    {
        return $this->hasMany('App\Models\Membership');
    }

    public static function scopeWhereProject($query, $project)
    {
        return $query->whereHas('project', function (Builder $builder) use ($project) {
            $builder->where('project', $project ?? request('project_id'));
        });
    }
}
