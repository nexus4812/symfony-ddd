<?php

namespace Guess\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Guess\Domain\League\League;
use Guess\Domain\Player\Player;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private UserPasswordEncoderInterface $encoder;

    public function __construct(
        UserPasswordEncoderInterface $encoder
    )
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $manager->persist((new League())
            ->setId(1)
            ->setName('Premier League')
            ->setLeagueNameSlugged('premier-league')
            ->setLeagueApiId(123)
            ->setLogo('premier-league.png')
        );

        $player = new Player();
        $player
            ->setUsername('fmo')
            ->setEmail('test@example.com')
            ->setPassword($this->encoder->encodePassword($player,'123123'));

        $manager->persist($player);
        $manager->flush();
    }
}
