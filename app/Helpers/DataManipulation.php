<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

function manipulate_data($data, array $columns)
{
    if (is_object($data)) {
        $data = obj_to_arr($data);
    }

    if (is_collection($data)) {
        $data = collection_to_arr($data);
    }

    return array_map(function ($item) use ($columns) {
        return manipulate_sig_data($item, $columns);
    }, $data);
}

function manipulate_sig_data($data, array $columns)
{
    $columnValues = array();

    foreach ($columns as $col => $type) {

        if (is_int($col)) {

            if ($type == 'id') {
                $columnValues[$type] = myEncrypt($data[$type]);
            } else {
                $columnValues[$type] = $data[$type];
            }

            continue;
        }

        if (is_array($type)) {
            if ($type[0] == 'date') {
                $columnValues[$col] = $data[$type[1]];

                if (array_key_exists(2, $type)) {
                    $columnValues[$col] = Carbon::parse($columnValues[$col])->format($type[2]);
                }
            }
        }
    }

    return $columnValues;
}

function is_collection($data)
{
    if ($data instanceof Collection) {
        return true;
    }

    return false;
}

function obj_to_arr($data)
{
    return json_decode(json_encode($data), true);
}

function collection_to_arr($data)
{
    return $data->toArray();
}

function get_image($path)
{
    return $path ? asset("storage/" . $path) : "http://127.0.0.1:8000/image/common/profile.svg";
}


