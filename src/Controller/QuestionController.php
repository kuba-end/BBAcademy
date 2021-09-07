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
        return $this->render('question/homepage.html.twig');
    }
    #[Route('/questions/{slug}', name: 'question')]

    public function show($slug)
    {
        $answers = [
            'Make sure smth',
            'Nope it is not possible',
            'I dont know but i wanted add reply',
        ];
        return $this->render('question/show.html.twig',[
            'question' => ucwords(str_replace("-"," ",$slug)),
            'answers' => $answers,
        ]);
    }
}