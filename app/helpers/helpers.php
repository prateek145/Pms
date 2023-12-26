<?php

function second_hours($sec)
{
    $value = \Carbon\Carbon::parse($sec)->format('H:i:s');
    // dd($value);
    return $value;

}