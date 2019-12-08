<?php

use Carbon\Carbon;
/**
* change plain number to formatted currency
*
* @param $number
*/

function formatNumber($number)
{
   return number_format($number, 2, '.', '.');
}
function diffDay($start, $end)
{
    $startDate = strtotime($start);
    $endDate = strtotime($end);
    $datediff = $endDate-$startDate;

    return round($datediff/(60*60*24))+1;
}
function stringBtn($input)
{
    $middleVallue = str_replace('_btn', '', $input);
    $finalValue = str_replace('_', ' ', $middleVallue);
    return ucwords($finalValue);
}
function getExtension($domain)
{
    $extension1 = preg_split('/(?=\.[^.]+$)/', $domain)[1];
    $extension = str_replace('.', '', $extension1);
    return $extension;
}
function timecut($timestamp)
{
    return date('g:ia', strtotime($timestamp));
}
function before_date($start_date, $frequency)
{
    $date = 0;

    $end_date = Carbon::now()->toDateString();

    while ($start_date->toDateString()<=$end_date) {

        $date= $start_date->toDateString();

        switch ($frequency) {
            case '1-week':
                $start_date = $start_date->addWeek();
                break;
            case '2-weeks':
                $start_date = $start_date->addWeeks(2);
                break;
            case '1-month':
                $start_date = $start_date->addMonth();
                break;
            case '2-months':
                $start_date = $start_date->addMonths(2);
                break;
            case '1-year':
                $start_date = $start_date->addYear();
                break;
        }
    }

    return $date;
}

function getDomainEmail()
{
    $email = env("MAIL_USERNAME", "info@workfromhomebusinessideas.com");
    $domain = substr($email, strpos($email, '@') + 1);
    return $domain;
}
