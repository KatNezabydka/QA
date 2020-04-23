<?php

namespace App\Enum;

use Elao\Enum\Enum;

class StatusEnum extends Enum
{
    public const DRAFT = 'draft';
    public const PUBLISHED = 'published';

    public static function values(): array
    {
        return [
            self::DRAFT,
            self::PUBLISHED,
        ];
    }
}
