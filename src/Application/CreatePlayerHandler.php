<?php


namespace Guess\Application;


use Guess\Domain\Player\Player;
use Guess\Domain\Player\PlayerRepositoryInterface;
use RuntimeException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreatePlayerHandler
{
    public function __construct(
        private PlayerRepositoryInterface $playerRepository,
        private UserPasswordEncoderInterface $encoder,
    )
    {
    }

    /**
     * @param array $playerArray
     */
    public function handle(array $playerArray): void
    {
        $player = new Player();
        $player
            ->setUsername($playerArray['username'])
            ->setEmail($playerArray['email'])
            ->setAvatar($playerArray['avatar'])
            ->setPassword($this->encoder->encodePassword($player, $playerArray['password']));

        try {
            $this->playerRepository->save($player);
        } catch (\Exception $e) {
            throw new RuntimeException('User can not be saved : '. $e->getMessage());
        }
    }
}