<?php

function myEncrypt($plaintext, $password = null)
{
    $output         = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key     = config('services.myhash.secret_key');
    $secret_iv      = config('services.myhash.secret_iv');

    // hash
    $key = hash('sha256', is_null($password) ? $secret_key : $password);

    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($plaintext, $encrypt_method, $key, 0, $iv);
    return base64_encode($output);
}

function myDecrypt($ciphertext, $password = null)
{
    $output         = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key     = config('services.myhash.secret_key');
    $secret_iv      = config('services.myhash.secret_iv');

    // hash
    $key = hash('sha256', is_null($password) ? $secret_key : $password);

    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    return openssl_decrypt(base64_decode($ciphertext), $encrypt_method, $key, 0, $iv);
}
