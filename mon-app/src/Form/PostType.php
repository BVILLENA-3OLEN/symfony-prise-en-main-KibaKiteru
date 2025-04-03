<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
			->add(
				child: 'author',
				type: TextType::class,
				options: [
					'constraints' => [
						new NotBlank(),
						new Length(max: 255),
					]
				]
			)
            ->add(
				child: 'title',
				type: TextType::class,
				options: [
					'constraints' => [
						new NotBlank(),
						new Length(max: 100),
					]
				]
				)
            ->add(
				child: 'content',
				type: TextType::class,
				options: [
					'constraints' => [
						new NotBlank(),
					]
				]
			)
            ->add(
				child: 'publishedAt',
				type: DateType::class,
				options: [
					'label' => 'publishedAt',
					'constraints' => [
						new NotNull(),
					]
            	]
			)
			->add(
				child: 'save',
				type: SubmitType::class,
				options: [
					'label' => 'Create Post'
				]
			)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
