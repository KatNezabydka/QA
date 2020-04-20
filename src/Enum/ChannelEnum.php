<?php

namespace App\Enum;

use Elao\Enum\FlaggedEnum;

class ChannelEnum extends FlaggedEnum
{
    private const FAQ = 1;
    private const BOT = 2;

    public static function values(): array
    {
        return [
            self::FAQ,
            self::BOT,
        ];
    }

    public static function readables(): array
    {
        return [
            static::FAQ => 'faq',
            static::BOT => 'bot',
        ];
    }
}
