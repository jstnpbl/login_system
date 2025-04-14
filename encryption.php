<?php
define('ENCRYPTION_KEY', 'your-strong-secret-key'); // Change this to a secure key (at least 32 characters)

function encryptData($data) {
    $key = hash('sha256', ENCRYPTION_KEY, true); // Ensure 256-bit key
    $iv_length = openssl_cipher_iv_length('aes-256-cbc');
    $iv = openssl_random_pseudo_bytes($iv_length);
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($iv . $encrypted);
}

function decryptData($data) {
    $key = hash('sha256', ENCRYPTION_KEY, true);
    $data = base64_decode($data);
    $iv_length = openssl_cipher_iv_length('aes-256-cbc');
    $iv = substr($data, 0, $iv_length);
    $encrypted = substr($data, $iv_length);
    return openssl_decrypt($encrypted, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
}
?>
