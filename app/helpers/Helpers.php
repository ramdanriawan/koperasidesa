<?php 

function format_idr(int $number) : string
{
    $number = "Rp" . number_format($number, 0, ',', '.');

    return $number;
}