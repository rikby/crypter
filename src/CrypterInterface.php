<?php
namespace Rikby\Crypter;

/**
 * Class Crypter
 *
 * @package Rikby\Crypter
 */
interface CrypterInterface
{
    /**
     * Encrypt string
     *
     * @param string      $string
     * @param null|string $key    Encrypt key
     * @return string
     */
    public function encrypt($string, $key = null);

    /**
     * Decrypt string
     *
     * @param string      $string
     * @param null|string $key    Encrypt key
     * @return string
     */
    public function decrypt($string, $key = null);
}
