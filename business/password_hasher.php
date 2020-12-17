<?php


class PasswordHasher
{
    public static function Hash($password, $withPrefix = true)
    {
        if($withPrefix)
            $hashed_password = sha1(HASH_PREFIX . $password);
        else 
            $hashed_password = sha1($password);

        return $hashed_password;
    }

    
// HASH_PREFIX.$this->mPassword.$this->mUsername.$this->mComfirmPassword;/
    public static function HashB($password, $withPrefix = true)
    {
        if($withPrefix)
            $hashed_password = password_hash(HASH_PREFIX . $password, PASSWORD_BCRYPT);
        else 
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        return $hashed_password;
    }

}
?>