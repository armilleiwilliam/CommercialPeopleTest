<?php

// App\src\Service
namespace App\Services;

use App\Classes\Token;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @author William Armillei armilleiwilliam@gmail.com
 */
class JWTcreator implements JWTcreatorInterface
{
    //
    const ALG = 'HS256';

    private $jwt;

    private $em;

    private $secret = 'abC123*%';

    public function __construct(EntityManagerInterface $entityManager = null)
    {
        $this->em = $entityManager;
        $this->jwt = new Token();
    }

    public function encodeJWT($username): string
    {
        $this->jwt->setIatTime(time());
        $time = new \DateTime();
        $this->jwt->setExpireTime($time->add(new \DateInterval('PT1H')));
        $user = $this->em->getRepository(User::class)->findOneByUsername($username);

        if ($user != null) {
            $header = ['typ' => 'JWT', 'alg' => 'HS256', 'exp' => $this->jwt->getExpireTime()];
            $payload = ['user_id' => $user->getId()];

            $this->jwt->setHeaderEncoded($this->base64Encode($header));
            $this->jwt->setPayloadEncoded($this->base64Encode($payload));
            $this->jwt->setSignatureEncoded($this->signatureGeneration($this->jwt->getHeaderEncoded(), $this->jwt->getPayLoadEncoded()));
            $this->jwt->setToken($this->jwt->getHeaderEncoded() . "." . $this->jwt->getPayLoadEncoded() . "." . $this->jwt->getSignatureEncoded());

            return $this->jwt->getToken();
        }
        throw new \UnexpectedValueException("User not found");
    }

    public function decodeJWT($stringJWTtoken): Token
    {
        $parts = explode('.', $stringJWTtoken);

        if (count($parts) == 3) {
            $header = $this->base64Decode($parts[0]);
            $payload = $this->base64Decode($parts[1]);

            $this->jwt->setHeaderDecoded($header);
            $this->jwt->setPayloadDecoded($payload);
            $this->jwt->setSignatureEncoded($parts[2]);
            return $this->jwt;
        }
        throw new \UnexpectedValueException("Wrong token format");
    }

    public function base64Encode(Array $encodeValue): string
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode(json_encode($encodeValue, true)));
    }

    public function base64Decode(String $encodeValue): array
    {
        return json_decode(base64_decode($encodeValue), true);
    }

    public function signatureGeneration(string $base64UrlHeader, string $base64UrlPayload): string
    {
        return hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $this->secret);
    }

    public function getExpireTime(): \DateTime
    {
        return $this->jwt->getExpireTime();
    }
}

