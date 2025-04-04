<?php
declare(strict_types=1);

namespace App\Controller\Index;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
	path: '/',
	name: 'app_index_get'
)]
class IndexGetController extends AbstractController {

	public function __invoke (
		PostRepository $postRepo,
		#[MapQueryParameter]
		?string $nom = null,
		): Response {
			$allPost = $postRepo->getAllPublish();
			return $this->render(
				view: 'pages/index/index.html.twig',
				parameters: [
					'page_title' => 'Hello',
					'nom' => $nom,
					'published_posts' =>$allPost,
				],
			);
	}
}
