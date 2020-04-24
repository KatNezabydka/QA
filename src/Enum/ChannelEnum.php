<?php

namespace App\Enum;

use Elao\Enum\Enum;

class ChannelEnum extends Enum
{
    private const FAQ = 'faq';
    private const BOT = 'bot';

    public static function values(): array
    {
        return [
            self::FAQ,
            self::BOT,
        ];
    }
}
