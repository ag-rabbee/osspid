<?php

namespace Rabbee\Osspid;

class Encryptor
{
    const METHOD = 'aes-256-cbc';
    const DELIMITER = '::';
    /**
     * @var string
     */
    private $secret;

    /**
     * Encrypter constructor.
     *
     */
    public function __construct()
    {
        $this->secret = 'BA5#$*7#';
    }

    /**
     * @param string $data
     *
     * @return string
     */
    public function encrypt($data)
    {
        $length = openssl_cipher_iv_length(self::METHOD);
        $iv = random_bytes($length);
        $data = base64_encode($data . self::DELIMITER . $iv);
        return str_replace(array('+', '/', '='), array('-', '_', ''), $data);
    }

    /**
     * @param string $data
     *
     * @return string
     */
    public function decrypt($data)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $data);
        list($encrypted, $iv) = explode(self::DELIMITER, base64_decode($data), 2);
        return $encrypted;
    }
}