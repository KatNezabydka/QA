<?php declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route("/login", name="qa_login")
     */
    public function loginAction(): Response
    {
        return $this->render('login.html.twig');
    }

    /**
     * @return Response
     *
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction(): Response
    {
        return $this->render('login.html.twig');
    }

}
