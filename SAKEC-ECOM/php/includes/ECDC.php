<?php

class ECDC{
	private static  $key = "d0a7e7997b6d5fcd55f4b5c32611b87cd923e88837b63bf2941ef819dc8ca282";

	public static function encrypt($encrypt){
		// echo self::$key .'***';
		$encrypt = serialize($encrypt);
        $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC), MCRYPT_DEV_URANDOM);
        $lkey = pack('H*', self::$key);
        $mac = hash_hmac('sha256', $encrypt, substr(bin2hex($lkey), -32));
        $passcrypt = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $lkey, $encrypt.$mac, MCRYPT_MODE_CBC, $iv);
        $encoded = base64_encode($passcrypt).'|'.base64_encode($iv);
        return $encoded;
	}

	public static function decrypt($decrypt){
		$decrypt = explode('|', $decrypt);
        $decoded = base64_decode($decrypt[0]);
        $iv = base64_decode($decrypt[1]);
        $lkey = pack('H*', self::$key);
        $decrypted = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $lkey, $decoded, MCRYPT_MODE_CBC, $iv));
        $mac = substr($decrypted, -64);
        $decrypted = substr($decrypted, 0, -64);
        $calcmac = hash_hmac('sha256', $decrypted, substr(bin2hex($lkey), -32));
        if($calcmac!==$mac){ return false; }
        $decrypted = unserialize($decrypted);
        return $decrypted;
	}
}

$ecdc = new ECDC();

?>