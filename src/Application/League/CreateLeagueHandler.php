<?php


namespace Guess\Application\League;


use Guess\Application\Service\FileUploaderInterface;
use Guess\Domain\League\League;
use Guess\Domain\League\LeagueRepositoryInterface;

class CreateLeagueHandler
{
    public function __construct(
        private LeagueRepositoryInterface $repository,
        private FileUploaderInterface $uploader,
    )
    {
    }

    public function handle(array $league): void
    {
        if(empty($league['logo'])) {
            throw new \DomainException('We need team logo to saved');
        }

        if($this->repository->findByOne(['name' => $league['name']])) {
            throw new \DomainException('League already exist');
        }

        try {
            $this->uploader->upload('guess-league-logos', $league['name'], $league['logo']);
        } catch (\Exception $e) {
            throw new \RuntimeException('League logo can not save : '. $e->getMessage());
        }

        try {
            $this->repository->save(
                (new League())
                    ->setName($league['name'])
                    ->setLogo($this->uploader->getImageUrl())
                    ->setLeagueApiId($league['leagueApiId'])
                    ->setLeagueNameSlugged($league['leagueNameSlugged'])
            );
        } catch (\Exception $e) {
            throw new \RuntimeException('League can not save : '. $e->getMessage());
        }
    }
}