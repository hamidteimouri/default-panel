<?php

//encrypt
function href_encrypt($data)
{
    return urlencode(base64_encode($data));
}

//decrypt
function href_decrypt($data)
{
    return urldecode(base64_decode($data));
}