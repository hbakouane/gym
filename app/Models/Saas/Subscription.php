<?php

namespace App\Models\Saas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public $fillable = ['user_id', 'plan_id', 'subscription_id', 'status', 'payment_method', 'amount'];

    public $table = 'saas_subscriptions';

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan');
    }
}
