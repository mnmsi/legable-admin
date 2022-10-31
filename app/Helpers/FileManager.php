<?php

use Illuminate\Support\Facades\Storage;

function file_upload($password, $file)
{
    $fileUrl     = 'content/' . $file->getClientOriginalName();
    $fileContent = myEncrypt($file->getContent(), $password);

    $binToHex = bin2hex($fileContent);

    $store = Storage::disk('public')->put($fileUrl, $binToHex);

    if ($store) {
        return myEncrypt($fileUrl);
    }

    abort(404);
}

function get_file($password, $url)
{
    $fileUrl        = myDecrypt($url);
    $fileExplodeArr = explode('/', $fileUrl);
    $fileName       = $fileExplodeArr[array_key_last($fileExplodeArr)];

    $hexFile       = Storage::disk('public')->get($fileUrl);
    $encryptedFile = hex2bin($hexFile);

//    $response = response()->stream(function () use ($encryptedFile, $password) {
//        echo myDecrypt($encryptedFile, $password);
//    });
//
//    $disposition = $response->headers->makeDisposition(
//        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
//        $fileName,
//        str_replace('%', '', Str::ascii($fileName))
//    );
//
//    $response->headers->set('Content-Disposition', $disposition);

//    return $response;
//    return response()->stream(function () use ($encryptedFile, $password) {
//        echo myDecrypt($encryptedFile, $password);
//    }, 200, [
//        'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
//        'Content-Type'        => Storage::mimeType($fileName),
//        'Content-Disposition' => 'attachment; filename="' . basename($fileName) . '"',
//        'Pragma'              => 'public',
//    ]);

    return response()->make(myDecrypt($encryptedFile, $password), 200, [
        'Content-Type'        => Storage::mimeType($fileName),
        'Content-Disposition' => 'inline; filename="' . $fileName . '"',
    ]);
}
