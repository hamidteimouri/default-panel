<?php
function timeConvertToPersian($time)
{
    $date = [];
    $date['date'] = \Morilog\Jalali\jDateTime::strftime('%d  %B  %Y', strtotime($time));
//    $date['dateAndTime'] = \Morilog\Jalali\jDateTime::strftime('%m : %H - %d  %B  %Y', strtotime($time));
    $date['dateAndTime'] = \Morilog\Jalali\jDateTime::strftime('%m:%H - %Y/%m/%d', strtotime($time));
    $date['month'] = \Morilog\Jalali\jDateTime::strftime('%B', strtotime($time));
    $date['day'] = \Morilog\Jalali\jDateTime::strftime('%d', strtotime($time));
    $date['year'] = \Morilog\Jalali\jDateTime::strftime('%Y', strtotime($time));
    $date['time'] = \Morilog\Jalali\jDateTime::strftime('%H : %m', strtotime($time));
    return $date;
}

function showPersianFullTime($time)
{
    switch (__('content.direction')) {
        case 'rtl';
            $result = \Morilog\Jalali\jDate::forge($time)->format('H:i') . " " . \Morilog\Jalali\jDate::forge($time)->format('Y/m/d');
            break;
        case 'ltr';
            $result = \Carbon\Carbon::parse($time)->format('Y-m-d') . " " . \Carbon\Carbon::parse($time)->format('H:i');
            break;
    }
    return $result;
}

function ShowDate($time)
{
    $result = $time;
    switch (__('content.direction')) {
        case 'rtl';
            $result = \Morilog\Jalali\jDate::forge($time)->format('Y/m/d');
            break;
        case 'ltr';
            $result = \Carbon\Carbon::parse($time)->format('Y-m-d');
            break;
    }
    return $result;
}

function ShowTime($time)
{
    switch (__('content.direction')) {
        case 'rtl';
            $result = \Morilog\Jalali\jDate::forge($time)->format('H:i');
            break;
        case 'ltr';
            $result = \Carbon\Carbon::parse($time)->format('H:i');
            break;
    }
    return $result;
}

function NowDay()
{
    switch (__('content.direction')) {
        case 'rtl';
            $result = \Morilog\Jalali\jDate::forge()->format('%A');
            break;
        case 'ltr';
            $result = \Carbon\Carbon::now()->formatLocalized('%A');
            break;
    }
    return $result;
}

function NowDate()
{
    switch (__('content.direction')) {
        case 'rtl';
            $result = \Morilog\Jalali\jDate::forge()->format('%d/%B/%Y');
            break;
        case 'ltr';
            $result = \Carbon\Carbon::now()->formatLocalized('%d / %B / %Y');
            break;
    }
    return $result;
}

function showPersianDateWithLetter($time)
{
    // Show Date in Persian
    return \Morilog\Jalali\jDate::forge($time)->format('d F Y');
}

function showDateWithLetterAnyLanguage($time)
{
    $lang = App::getLocale();

    if ($lang == 'fa') {
        // Show Date in Persian
        return \Morilog\Jalali\jDate::forge($time)->format('d F Y');

    } elseif ($lang == 'ar') {
        // Show Time in Arabic
        //https://github.com/maherelgamil/arabicdatetime

        // change date to timestamp
        $ts = \Carbon\Carbon::parse($time)->timestamp;
        //$arabic = new \Maherelgamil\Arabicdatetime\Arabicdatetime();
        // $d = $arabic->date($ts, 1, 'd / m / y ', 'indian');
        // return $d;

    } elseif ($lang == 'en') {
        // Show Time in Arabic
        return \Carbon\Carbon::now()->formatLocalized('%d/%B/%Y');
    }
}

function showDayAndMonthAnyLanguage($time)
{
    // Show in Persian
    $data['month'] = \Morilog\Jalali\jDate::forge($time)->format('F');
    $data['day'] = \Morilog\Jalali\jDate::forge($time)->format('d');
    return $data;
}

function persianToday()
{
    $time = now();
    return \Morilog\Jalali\jDate::forge($time)->format('Y/m/d');
}

function persianNow()
{
    $time = now();
    return \Morilog\Jalali\jDate::forge($time)->format('H:i');
}

