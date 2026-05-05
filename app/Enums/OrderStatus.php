<?php

namespace App\Enums;

enum OrderStatus: string
{
  case Proses = 'proses';
    case Packing = 'packing';
    case Delivering = 'delivering';
    case Finnish = 'finnish';

    public static function values(): array
    {
        return array_map(fn (self $s) => $s->value, self::cases());
    }
}
