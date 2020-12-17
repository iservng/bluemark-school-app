<?php

// function encryptthis($data, $key) 
// {
//     $encryption_key = base64_decode($key);
//     $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
//     $encrypted_data = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
//     return base64_encode($encrypted_data.'::'.$iv);
// }

// function decryptthis($data, $key) 
// {
//     $encryption_key = base64_decode($key);
//     list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
//     return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
// }


// $key = '90635fdt6agjiubCDINBW0298%%$g)(*h$#@hkiJp{}":;;kkj*(%$%GHGSDJ3640';
// $miData = 'i love you';

// $miData_encrypted_version = encryptthis($miData, $key);
// $miData_decrypted_version = decryptthis($miData_encrypted_version, $key);

// echo '<h3>Encrypte data = '.$miData_encrypted_version .'</h3>';
// echo '<h3>Decrypte data = '.$miData_decrypted_version.'</h3>';



// $first_arr = array(
//     'fname' => 'onyeka onwutalu',
//     'email' => 'bangisandu@gmail.com',
//     'married' => true
// );

// $second_arr = array(
//     'doughter' => 'naeto onyeka',
//     'emaild' => 'naetoh@gmail.com',
//     'ismarried' => false
// );
// $request_string = '';
// $first_arr = array_merge($second_arr, $first_arr);

// foreach($first_arr as $key => $value) 
// {
//     $request_string .= $key . '=' . urlencode($value) . '&';
// }

// var_dump($request_string);


?>