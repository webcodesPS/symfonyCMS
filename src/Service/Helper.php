<?php

namespace App\Service;

class Helper
{
    const LOCALE_EN = 'en';
    const LOCALE_PL = 'pl';
    const LOCALE_FR = 'fr';
    const LOCALE_DE = 'de';

    /**
     * Return frequency list
     *
     * @return array
     */
    public static function getLocaleList(): array
    {
        return [
            self::LOCALE_PL => 'pl',
            self::LOCALE_EN => 'en',
            self::LOCALE_FR => 'fr',
            self::LOCALE_DE => 'de',
        ];
    }
}