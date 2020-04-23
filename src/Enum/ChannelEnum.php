<?php

namespace App\Enum;

use Elao\Enum\FlaggedEnum;

class ChannelEnum extends FlaggedEnum
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
