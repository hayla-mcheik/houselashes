<?php

use Illuminate\Support\Str;

if (!function_exists('words_limit')) {
    function words_limit($text, $limit = 10)
    {
        return Str::words($text, $limit, '...');
    }
}
