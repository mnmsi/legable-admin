<?php

use Illuminate\Support\Facades\Storage;

function file_upload($file)
{
    $fileName    = myEncrypt($file->getClientOriginalName());
    $fileUrl     = 'content/' . $fileName;
    $fileContent = myEncrypt($file->getContent());

    $binToHex = bin2hex($fileContent);

    $store = Storage::disk('public')->put($fileUrl, $binToHex);

    if ($store) {
        return $fileUrl;
    }

    abort(404);
}

function get_file($url)
{
    $fileUrl        = myDecrypt($url);
    $fileExplodeArr = explode('/', $fileUrl);
    $fileName       = $fileExplodeArr[array_key_last($fileExplodeArr)];
    $hexFile        = Storage::disk('public')->get($url);
    $encryptedFile  = hex2bin($hexFile);

    return response()->streamDownload(function () use ($encryptedFile) {
        echo myDecrypt($encryptedFile);
    }, $fileName);
}
