<?php

function second_hours($sec)
{
    $value = gmdate("H:i:s", $sec);
    return $value;

}