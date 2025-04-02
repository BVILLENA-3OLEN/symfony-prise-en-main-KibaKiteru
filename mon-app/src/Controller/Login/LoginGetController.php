<?php

namespace App\Controller\Login;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
	path: '/login',
	name: 'app_login_get',
	methods: [Request::METHOD_GET],
)]

Class LoginGetController extends AbstractController {
	public function __invoke(): Response
	{
		return $this->render(
			view: 'pages/login/login.html.twig',
		);
	}
}
