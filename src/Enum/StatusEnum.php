<?php

namespace App\Enum;

use Elao\Enum\FlaggedEnum;

class StatusEnum extends FlaggedEnum
{
    private const DRAFT = 1;
    private const PUBLISHED = 2;

    public static function values(): array
    {
        return [
            self::DRAFT,
            self::PUBLISHED,
        ];
    }

    public static function readables(): array
    {
        return [
            static::DRAFT => 'draft',
            static::PUBLISHED => 'published',
        ];
    }
}
