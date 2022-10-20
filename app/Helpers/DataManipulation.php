<?php


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
        $columnValues = array();
        foreach ($columns as $col => $type) {

            if (is_int($col)) {
                $columnValues[$type] = $item[$type];
                continue;
            }

            if ($type == 'encrypt') {
                $columnValues[$col] = $item[$col];
            }

            if (!array_key_exists('created_at', $columns)) {
                $columnValues['created_at'] = $item['created_at'];
            }
        }
        return $columnValues;
    }, $data);
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


