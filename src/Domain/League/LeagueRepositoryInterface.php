<?php


namespace Guess\Domain\League;


interface LeagueRepositoryInterface
{
    public function findByOne(array $query): ?League;

    public function save(League $league): void;
}