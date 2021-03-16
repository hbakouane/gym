<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = ['member_id', 'project_id', 'amount', 'payment_type', 'payment_date', 'note'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'project');
    }

    public function scopeAsc($query, $column = 'id')
    {
        $query->orderBy($column, 'ASC');
    }

    public function scopeWhereProject($query, $project)
    {
        return $query->whereHas('project', function (Builder $builder) use ($project) {
            $builder->where('project', $project ?? request('project_id'));
        });
    }
}
