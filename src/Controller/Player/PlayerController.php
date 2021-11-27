<?php


namespace Guess\Controller\Player;


use Guess\Application\CreatePlayerHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PlayerController
{
    public function __construct(private CreatePlayerHandler $playerHandler)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $playerArray = json_decode($request->getContent(), true);

        try {
            $this->playerHandler->handle([
                'username' => $playerArray['username'],
                'email' => $playerArray['email'],
                'password' => $playerArray['password'],
                'avatar' => $playerArray['avatar'],
            ]);
        } catch (\Exception $e) {
            return new JsonResponse('Error : '. $e->getMessage());
        }

        return new JsonResponse('User created');
    }
}