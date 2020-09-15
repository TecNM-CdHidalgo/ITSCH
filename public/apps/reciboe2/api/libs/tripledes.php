<?php
class TripleDes{
    private $secret_key;
    private $iv;

    public function __construct($secret_key, $iv) {
        $this->secret_key = $secret_key;
        $this->iv = $iv;
    }

    public function encrypt($string){
        $enc = openssl_encrypt($string, "DES-EDE3-CBC", $this->secret_key, OPENSSL_RAW_DATA, $this->iv);
        $res = base64_encode($enc);
        return $res;
    }

    public function decrypt($string){
        $buffer = base64_decode($string);
        $res = openssl_decrypt($buffer, "DES-EDE3-CBC", $this->secret_key, OPENSSL_RAW_DATA, $this->iv);
        return $res;
    }
}
?>