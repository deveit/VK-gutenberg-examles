<?php

function tr_trim_text_to_length($text, $length)
{
    if (strlen($text) > $length) {
        return mb_substr($text, 0, $length - 3) . '...';
    }
    return $text;
}