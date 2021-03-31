<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Membership extends Model
{
    use HasFactory;

    public $fillable = ['member_id', 'model_type', 'model_id', 'project_id', 'payment_date', 'amount', 'note', 'membership_id'];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
