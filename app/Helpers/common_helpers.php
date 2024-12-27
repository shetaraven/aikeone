<?php
if (! function_exists('set_array_key')) {
    function set_array_key($key, $array)
    {
        $fin_list = [];

        foreach ($array as $array_key => $value) {
            $fin_list[$value[$key]] = $value;
        }

        return $fin_list;
    }
}

if (! function_exists('set_array_group_key')) {
    function set_array_group_key($key, $array)
    {
        $fin_list = [];

        foreach ($array as $array_key => $value) {
            $fin_list[$value[$key]][] = $value;
        }

        return $fin_list;
    }
}

if (! function_exists('json_res')) {
    function json_res($type = 'success', $data = [] )
    {
        $res = [
            'error' => 0,
            'message' => '',
            'data' => $data
        ];

        switch ($type) {
            case 'session_error':
                $res['error'] = $type;
                $res['message'] = 'Please login to continue';
                break;
            
            default:
                break;
        }
        

        return json_encode($res);
    }
}
