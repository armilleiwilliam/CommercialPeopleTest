<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authentication\SimplePreAuthenticatorInterface;

class ApiKeyAuthenticator implements SimplePreAuthenticatorInterface
{
    /*
     * the username
     *
     * @var username
     */
    private $username;

    /*
     * the payload
     *
     * @var payload
     */
    private $payload;

    /*
     * the header
     *
     * @var header
     */
    private $header;

    /*
     * the token
     *
     * @var beartoken
     */
    private $bearToken;

    /*
     * the token expiring time
     *
     * @DateTime
     */
    private $expireTime;

    /*
     *  The token signature
     *
     * @var signature
     */
    private $signature;

    public function createToken(Request $request, $providerKey)
    {
        // look for an apikey query parameter
        if (preg_match("/Bearer(\s+)/", $request->headers->get('Authorization'))) {

            $findBearToken = explode(" ", $request->headers->get('Authorization'));
            $this->bearToken = $findBearToken[1];

            if (!$this->bearToken || $this->bearToken == '') {
                throw new BadCredentialsException();
            }
            return new PreAuthenticatedToken(
                'anon.',
                $this->username,
                $providerKey
            );
        }
        throw new BadCredentialsException();
    }

    public function supportsToken(TokenInterface $token, $providerKey)
    {
        return $token instanceof PreAuthenticatedToken && $token->getProviderKey() === $providerKey;
    }

    public function authenticateToken(TokenInterface $token, UserProviderInterface $userProvider, $providerKey)
    {
        if (!$userProvider instanceof ApiKeyUserProvider) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The user provider must be an instance of ApiKeyUserProvider (%s was given).',
                    get_class($userProvider)
                )
            );
        }

        $jwtCreator = $userProvider->createJWT();

        // split the bear token and get the header, payload and signature information
        $jwtDecoded = $jwtCreator->decodeJWT($this->bearToken);

        $this->header = $jwtDecoded->getHeaderDecoded();
        $this->payload = $jwtDecoded->getPayloadDecoded();
        $this->signature = $jwtDecoded->getSignatureEncoded();

        // get a new signature with the header and payload given by the user's token which will be
        // compared after
        $jwtSignatureDecoded = $jwtCreator->signatureGeneration(
            $jwtCreator->base64Encode($this->header),
            $jwtCreator->base64Encode($this->payload)
        );

        if ($this->header["exp"]["date"] < (new \DateTime())->format("Y-m-d H:i:s")) {
            // CAUTION: this message will be returned to the client
            // (so don't put any un-trusted messages / error strings here)
            throw new CustomUserMessageAuthenticationException(
                sprintf('API Key "%s" expired.', $this->signature)
            );
        }

        // compare the signature received from the token's user and the one generated
        // with the header and payload decoded from the user's token to see if using the secret key
        // when decoding these two given values (payload and header) the two signatures match,
        // if the two signatures don't match the secret key value is not correct
        if ($jwtSignatureDecoded != $this->signature) {
            // CAUTION: this message will be returned to the client
            // (so don't put any un-trusted messages / error strings here)
            throw new CustomUserMessageAuthenticationException(
                sprintf('API Key "%s" does not exist.', $this->signature)
            );
        }

        // User is the Entity which represents your user
        $user = $token->getUser();
        return new PreAuthenticatedToken(
            $user,
            $this->bearToken,
            $providerKey,
            array("roles" => "ROLE_API")
        );
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new Response(
        // this contains information about *why* authentication failed
        // use it, or return your own message
            strtr($exception->getMessageKey(), $exception->getMessageData()),
            401
        );
    }
}