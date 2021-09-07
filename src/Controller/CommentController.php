<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('comments/{id}/vote/{direction<up|down>}', name:'comment_vote', methods: 'POST')]

    public function commentVote(int $id,
                                string $direction,
                                LoggerInterface $logger)
    {
        // todo use id to query database

        // use real logic to save this to db
        if('up' === $direction)
        {
            $logger->info('Voting up!');
            $currentVoteCount = rand(7,100);
        }else
        {
            $logger->info('Voting down!');

            $currentVoteCount = rand(0,5);
        }


        return $this->json(['votes' => $currentVoteCount]);
    }
}