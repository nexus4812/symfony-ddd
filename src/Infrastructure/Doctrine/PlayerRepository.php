<?php


namespace Guess\Infrastructure\Doctrine;


use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Guess\Domain\Player\Player;
use Guess\Domain\Player\PlayerRepositoryInterface;

class PlayerRepository extends ServiceEntityRepository implements PlayerRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }

    /**
     * @param Player $player
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Player $player): void
    {
        $this->_em->persist($player);
        $this->_em->flush();
    }
}