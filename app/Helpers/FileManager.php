<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

function file_content($password, $fileUrl)
{
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
    $fileUrl = myDecrypt($fileUrl);
    return image_data($fileUrl, file_content($password, $fileUrl));
}

function get_file_url($password, $fileUrl)
{
    $fileUrl  = myDecrypt($fileUrl);
    $fileName = file_name($fileUrl);

    return response()->make(file_content($password, $fileUrl), 200, [
        'Content-Type'        => Storage::mimeType($fileUrl),
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

function mimeType($file_url)
{
    $file_url = myDecrypt($file_url);
    if (!$file_url) {
        abort(404);
    }

    return explode('/', Storage::mimeType($file_url))[0];
}

function thumbnail($file_url)
{
    return match (mimeType($file_url)) {
        'image'      => asset('image/thumb/image.svg'),
        'excel'      => asset('image/thumb/excel.svg'),
        'powerpoint' => asset('image/thumb/powerpoint.svg'),
        'video'      => asset('image/thumb/video.svg'),
        'audio'      => asset('images/thumb/audio.svg'),
        default      => asset('image/content/demo1.svg'),
    };
}
