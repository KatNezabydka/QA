<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route("/", name="qa_index")
     */
    public function indexAction(): Response
    {
        return $this->render('base.html.twig');
    }
}