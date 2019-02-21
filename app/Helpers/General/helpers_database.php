<?php
function mainSetting($key)
{
    $result = '';
    // get object from DB
    $object = \App\Setting::where('name', $key)->first()->toArray();
    if (!$object) {
        return "not found";
    }
    switch ($object['type']) {
        case ('string'):
            $result = $object['value'];
            break;
        case ('textarea'):
            $result = $object['value'];
            break;
        case ('file'):
            $result = 'Hanoz Ok nashode ast';
            break;
        case ('bool'):
            $result = ($object['value'] == '1') ? true : false;
            break;
    }
    return $result;

}
