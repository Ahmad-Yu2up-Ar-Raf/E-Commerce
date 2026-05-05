<?php

namespace App\Models;

use App\Enums\PaymentsMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    //
    protected $table = 'products';

    protected $fillable = [
    'name',
    'description',
    'price',
    'thumnail_image',
    'images',
    'payment_method'
    ];

    protected $casts = [
    'name' => 'string',
    'description' => 'string',
    'price' => 'integer',
    'thumnail_image' => 'string',
    'images' => 'array',
    'payment_method'  => PaymentsMethod::class
    ];

  public function Transaction() : HasMany {
  return $this->hasMany(Transactions::class , 'product_id');
  }


}
