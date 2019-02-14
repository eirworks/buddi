<?php

namespace App\Helpers;


class StringHelper
{
    public static function reading_time($text)
    {
        $words = count(explode(" ", $text));

        $avg_read_words_per_minutes = 250;

        return ceil($words / $avg_read_words_per_minutes);
    }
}