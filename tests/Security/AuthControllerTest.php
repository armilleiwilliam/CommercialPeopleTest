<?php

namespace Tests\Controller\Security;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Doctrine\Common\Persistence\ObjectRepository;

class AuthControllerTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function testRegister()
    {

        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $user = new User("userMoke");
        $user->setPassword("password");

        $userRepository = $this->createMock(ObjectRepository::class);

        $userRepository->expects($this->any())
            ->method('find')
            ->willReturn($user);
    }
}