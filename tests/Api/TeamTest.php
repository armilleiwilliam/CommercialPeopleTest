<?php

namespace App\Tests\Api;

use App\Entity\League;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TeamTest extends KernelTestCase
{
    public function testGetTeams()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $responseContent = $this->entityManager
            ->getRepository(League::class)
            ->findById(1);

        $this->assertCount(1, $responseContent);
    }

    public function testNewTeam()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $responseLeagueContent = $this->entityManager
            ->getRepository(League::class)
            ->findOneByTitle("Premier league");

        $responseTeamContent = $this->entityManager
            ->getRepository(League::class)
            ->findOneByTitle("Manchester Utd");

        $this->assertCount(1, $responseTeamContent);
        $this->assertCount(1, $responseLeagueContent);
    }

    public function testEditTeam()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $responseLeagueContent = $this->entityManager
            ->getRepository(League::class)
            ->findOneByTitle("Premier league");

        $responseTeamContent = $this->entityManager
            ->getRepository(League::class)
            ->findOneByTitle("Manchester Utd");

        $this->assertCount(1, $responseTeamContent);
        $this->assertCount(1, $responseLeagueContent);
    }

    public function testDeleteTeam()
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();


        $responseLeagueContent = $this->entityManager
            ->getRepository(League::class)
            ->findOneByTitle("Premier league");
    }
}