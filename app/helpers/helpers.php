<?php

function second_hours($sec)
{
    $value = gmdate("H:i:s", $sec);
    return $value;

}

function minutesin_hours($min){
    $value = intdiv($min, 60).':'. ($min % 60);
    return $value;
}