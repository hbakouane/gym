<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    public $fillable = ['creditable_id', 'creditable_type', 'project_id', 'amount', 'payment_type', 'payment_date', 'note', 'status'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function creditable() {
        return $this->morphTo();
    }

    public function scopeAsc($query, $column = 'id')
    {
        $query->orderBy($column, 'ASC');
    }
}
