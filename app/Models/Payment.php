<?php

namespace App\Models;

use App\Scopes\AscScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = ['member_id', 'amount', 'payment_type', 'payment_date', 'note'];

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
}
