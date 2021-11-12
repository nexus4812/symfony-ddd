<?php

namespace Guess\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Guess\Domain\League\League;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $league = (new League())
            ->setId(1)
            ->setName('Premier League')
            ->setLeagueNameSlugged('premier-league')
            ->setLeagueApiId(123)
            ->setLogo('premier-league.png');

        $manager->persist($league);
        $manager->flush();
    }
}
