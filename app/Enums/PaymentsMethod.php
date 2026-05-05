<?php

namespace App\Enums;

enum PaymentsMethod: string
{
  case COD = 'cod';
    case Transfer = 'transfer';

    public static function values(): array
    {
        return array_map(fn (self $s) => $s->value, self::cases());
    }
}
