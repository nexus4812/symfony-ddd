<?php


namespace Guess\Infrastructure\Command;


use Guess\Application\League\CreateLeagueHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FetchLeaguesCommand extends Command
{
    /** @var string  */
    protected static $defaultName = 'app:fetch-leagues';


    public function __construct(string $name = null, private CreateLeagueHandler $handler)
    {
        parent::__construct($name);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output); // TODO: Change the autogenerated stub
    }
}