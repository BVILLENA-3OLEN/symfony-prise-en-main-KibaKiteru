<?php

namespace App\Controller\Post\Create;

use App\Entity\Post;
use App\Form\PostType;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
	path: '/post/create',
	name: 'app_post_create_get',
	methods: [Request::METHOD_GET],
)]

class PostCreateGetController extends AbstractController {
	public function __invoke() {

		$post = new Post();
		$post->setAuthor('Billy Vayanna');
		$post->setContent('toto');
		$post->setPublishedAt(new DateTimeImmutable());

		$form = $this->createForm(
			type: PostType::class,
		);

		return $this->render(
			view: 'pages/post/createPost.html.twig',
			parameters: [
				'page_title' => 'post',
				'formPost' => $form,
			]
		);
	}

}
