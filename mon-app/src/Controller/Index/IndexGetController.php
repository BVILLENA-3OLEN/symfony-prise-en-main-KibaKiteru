<?php
declare(strict_types=1);

namespace App\Controller\Index;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapQueryParameter;
use Symfony\Component\Routing\Attribute\Route;

#[Route(
	path: '/',
	name: 'app_index_get'
)]
class IndexGetController extends AbstractController{

	public function __invoke(
		#[MapQueryParameter]
		// TranslatorInterface $translator,
		?string $nom = null,
		): Response {
			return $this->render(
				view: 'pages/index/index.html.twig',
				parameters: [
					'page_title' => 'home',
					'nom' => $nom,
				],
			);
	}
}
