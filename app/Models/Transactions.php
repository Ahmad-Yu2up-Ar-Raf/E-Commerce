<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transactions extends Model
{
    //
    protected $table = 'transactions';

    protected $fillable = [
    'user_id',
    'product_id',
    'quantity',
    'total_price'
    ];

    protected $casts = [
    'quantity' => 'integer',
    'total_price' => 'integer'

    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo {
    return $this->belongsTo(Products::class, 'product_id');
    }

    public function order_updates() :  HasMany {
    return $this->hasMany(OrderStatus::class, 'transaction_id');
    }
}
