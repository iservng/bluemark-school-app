<?php

class SymmetricCrypt
{
    //Encryption/Decryption key
    private static $_msSecretKey = 'From Bangis to Multi-Billionaire';

    //The initialization vector
    // private static $_msHexaIv = 'c7098adc8d6128b5d4b4f7b2fe7f7f05';
    private static $_mskey = '90635fdt6agjiubCDINBW0298%%$g)(*h$#@hkiJp{}":;;kkj*(%$%GHGSDJ3640';

    //Use the Rijndael Encryption Algorithm
    // private static $_msCipherAlgorithm = MCRYPT_RIJNDAEL_128;

    /*Function encrypts plain text string recieved as parameter
    and returns the result in haxadecimal format*/
    public static function Encrypt($data)
    {
        //Tuesday-11-February-2020
        //Pack SymmetricCrypt::_msHaxaIv into a binary string
        // $binary_iv = pack('H*', self::$_msHexaIv);

        // //Encrypt $plainString
        // $binary_encrypted_string = mcrypt_encrypt(
        //     self::$_msCipherAlgorithm,
        //     self::$_msSecretKey,
        //     $plainString,
        //     MCRYPT_MODE_CBC,
        //     $binary_iv
        // );

        // //Convert $binary_encrypted_string to hexadecimal format
        // $hexa_encrypted_string = bin2hex($binary_encrypted_string);
        // return $hexa_encrypted_string;
        $key = self::$_mskey;
        $encryption_key = base64_decode($key);
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encrypted_data = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
        return base64_encode($encrypted_data.'::'.$iv);

    }



    /*Function decrypts hexadecimal string recieved as parameter
    and return the result in hexadecimal format*/
    public static function Decrypt($data)
    {
        ///Tuesday-11-February-2020 
        //Pack Symmetric::_msHexaIv into a binary string
        // $binary_iv = pack('H*', self::$_msHexaIv);

        // //Convert string in hexadecimal to byte array
        // $binary_encrypted_string = pack('H*', $encryptedString);

        // //Decrypt $binary_encrypted_string
        // $decrypted_string = mcrypt_decrypt(
        //     self::$_msCipherAlgorithm,
        //     self::$_msSecretKey,
        //     $binary_encrypted_string,
        //     MCRYPT_MODE_CBC,
        //     $binary_iv
        // );
        // return $decrypted_string;
        $key = self::$_mskey;
        $encryption_key = base64_decode($key);
        list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2), 2, null);
        return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
    }
}
?>