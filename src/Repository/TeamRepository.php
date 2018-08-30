<?php

namespace App\Repository;

use App\Entity\Team;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Team::class);
    }

    public function findTeamsByLeagueId($value): Array
    {
        return $this->createQueryBuilder('t')
            ->select("t.id", "t.title as team", "t.city", "t.web", "a.title as league")
            ->leftJoin('t.league', 'a')
            ->andWhere('t.league = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getArrayResult();
    }
}
