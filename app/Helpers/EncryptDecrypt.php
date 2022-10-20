<?php

function myEncrypt($secret_iv, $plaintext)
{
    $output         = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key     = config('services.myhash.secret');
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    $output = openssl_encrypt($plaintext, $encrypt_method, $key, 0, $iv);
    return base64_encode($output);
}

function myDecrypt($secret_iv, $ciphertext)
{
    $output         = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key     = config('services.myhash.secret');

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    return openssl_decrypt(base64_decode($ciphertext), $encrypt_method, $key, 0, $iv);
}
