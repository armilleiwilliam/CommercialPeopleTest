<?php

namespace App\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Services\JWTcreator;

class ApiKeyUserProvider implements UserProviderInterface
{
    public function getUsernameForApiKey($apiKey)
    {
    }

    public function loadUserByUsername($username): User
    {
        return new User(
            $username,
            null,
            array('ROLE_API')
        );
    }

    public function createJWT(): JWTcreator
    {
        return new JWTcreator();
    }

    public function refreshUser(UserInterface $user): UserInterface
    {
        return $user;
    }

    public function supportsClass($class): boolean
    {
        return User::class === $class;
    }
}