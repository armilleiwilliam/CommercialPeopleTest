<?php

// App\src\Service
namespace App\Services;

/**
 * @author William Armillei armilleiwilliam@gmail.com
 */
interface JWTcreatorInterface
{
    /**
     * Returns the generated token
     *
     * @param string $username
     * @return string
     *
     * @throws UnexpectedValueException when user doesn't exist
     */
    public function encodeJWT(String $username);

    /**
     * Returns the token's object with
     * containing the header, payload and signature
     *
     * @param string $token
     *
     * @return object
     * @throws UnexpectedValueException if the token is not valid
     */
    public function decodeJWT(String $token);

    /**
     * Returns a string with the token endcoded
     * @param array $encodeValue
     *
     * @return string
     */
    public function base64Encode(Array $encodeValue);

    /**
     * Returns an array decoded
     * @param string $encodeValue
     *
     * @return array
     */
    public function base64Decode(String $encodeValue);

    /**
     * Returns a signature
     * @param string $base64UrlPayload , $base64UrlHeader
     *
     * @return string
     */
    public function signatureGeneration(string $base64UrlHeader, string $base64UrlPayload);

    /**
     * Return a date
     *
     * @return DateTime
     */
    public function getExpireTime();
}

