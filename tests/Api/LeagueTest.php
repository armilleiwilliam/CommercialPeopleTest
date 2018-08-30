<?php
namespace App\Tests\Api;

use App\Entity\League;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LeagueTest extends KernelTestCase
{
    public function testGetTeams()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $responseContent = $this->entityManager
            ->getRepository(League::class)
            ->findAll();

        $this->assertCount(1, $responseContent);
    }
}