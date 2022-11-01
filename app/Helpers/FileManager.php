<?php

use Illuminate\Support\Facades\Storage;

function file_upload($password, $file)
{
    $fileUrl     = 'content/' . $file->getClientOriginalName();
    $fileContent = myEncrypt($file->getContent(), $password);

    $binToHex = bin2hex($fileContent);

    $store = Storage::put($fileUrl, $binToHex);

    if ($store) {
        return myEncrypt($fileUrl);
    }

    abort(404);
}

function file_content($password, $url)
{
    $fileUrl  = myDecrypt($url);
    $fileName = file_name($fileUrl);

    $hexFile      = Storage::get($fileUrl);
    $imageContent = myDecrypt(hex2bin($hexFile), $password);

    if (!$imageContent) {
        abort(404);
    }

    return $imageContent;
}

function get_file($password, $fileUrl)
{
    return image_data($fileUrl, file_content($password, $fileUrl));
}

function get_file_url($password, $fileUrl)
{
    $fileName = file_name($fileUrl);

    return response()->make(file_content($password, $fileUrl), 200, [
        'Content-Type'        => Storage::mimeType($fileName),
        'Content-Disposition' => 'inline; filename="' . $fileName . '"',
    ]);
}

function file_name($directory)
{
    $fileExplodeArr = explode('/', $directory);
    return $fileExplodeArr[array_key_last($fileExplodeArr)];
}

function image_data($directory, $imageContent)
{
    return 'data:' . Storage::mimeType($directory) . ';base64,' . base64_encode($imageContent);
}
