<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    public $fillable = ['member_id', 'project_id', 'amount', 'payment_type', 'payment_date', 'note'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function scopeAsc($query, $column = 'id')
    {
        $query->orderBy($column, 'ASC');
    }
}
