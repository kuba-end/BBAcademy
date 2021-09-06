<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{

    #[Route('/', name: 'homepage')]

    public function homepage(): Response
    {
        return new Response('coś noweago');
    }
    #[Route('/questions/{slug}', name: 'question')]

    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show "%s"',
            ucwords(str_replace("-"," ",$slug)),
        ));
    }
}