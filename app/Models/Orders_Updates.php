<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orders_Updates extends Model
{
    protected $table = 'orders__updates';

    protected $fillable = [
    'status',
    'transaction_id'
    ];

    protected $casts = [
    'status' => OrderStatus::class,
    'transaction_id' => 'integer'
    ];

    public function transaction() : BelongsTo {
    return $this->belongsTo(Transactions::class, 'transaction_id');
    }
}
