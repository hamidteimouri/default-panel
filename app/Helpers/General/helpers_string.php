<?php
function removeSpecialChar($string)
{
    $notAllowed = ['  ', ' ', '!', '@', '#', '$', '%', '&', '*', '(', ')', '+', ';', ':', "'", '"', '/', '\\', '?', '|'];
    $string = stripslashes($string);
    $string = trim($string);
    $string = str_replace($notAllowed, '-', $string);
    return $string;
}

function showClearedStatus($status)
{
    $res = '';
    switch ($status) {
        case 0:
            $res = 'تسویه نشده';
            break;
        case 1:
            $res = 'تسویه شده';
            break;
    }
    return $res;
}

function displayStatus($status)
{
    $res = '';
    switch ($status) {
        case 0:
            $res = "خیر";
            break;
        case 1:
            $res = "بله";
            break;
    }
    return $res;
}

function seenStatus($status)
{
    $res = '';
    /*
        if ($status == 'seen') {
            $res = "<span class='label label-success'>دیده شده</span>";
        } elseif ($status == 'unread') {
            $res = "<span class='label label-danger'>دیده نشده</span>";
        } elseif ($status == '0') {
            $res = "<span class='label label-danger'>دیده نشده</span>";
        } elseif ($status == 1) {
            $res = "<span class='label label-success'>دیده شده</span>";
        }*/

//    dd($status);
    switch ($status) {
        case '0':
            $res = "<span class='label label-danger'>دیده نشده</span>";
            break;
        case '1':
            $res = "<span class='label label-success'>دیده شده</span>";
            break;
        case 'seen':
            $res = "<span class='label label-success'>دیده شده</span>";
            break;
        case 'unread':
            $res = "<span class='label label-danger'>دیده نشده</span>";
            break;
    }


    return $res;
}

function replyStatus($status)
{
    $res = '';
    switch ($status) {
        case 'email':
            $res = "<span class='label label-primary'>پاسخ داده شده از طریق ایمیل</span>";
            break;
        case 'sms':
            $res = "<span class='label label-warning'>پاسخ داده شده از طریق SMS</span>";
            break;
        case "website":
            $res = "<span class='label label-success'>پاسخ داده شده از طریق وبسایت</span>";
            break;
        case 'not_replied':
            $res = "<span class='label label-danger'>بدون پاسخ</span>";
            break;
    }

    return $res;
}
