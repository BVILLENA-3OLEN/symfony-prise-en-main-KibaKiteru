<?php
declare(strict_types=1);

namespace App\Controller\Post\Create;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
	path: '/post/create',
	name: 'app_post_create_post',
	methods: [Request::METHOD_POST],
)]

class PostCreatePostController extends AbstractController {

	public function __invoke(
		/* EntityManagerInterface $entityManager,
		Request $req, */
	): Response {

		return $this->redirectToRoute(route: 'app_index_get');
	}
}
