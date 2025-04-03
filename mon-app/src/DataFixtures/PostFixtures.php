<?php

namespace App\DataFixtures;

use App\Entity\Post;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PostFixtures extends Fixture {
	public function load(ObjectManager $manager): void {
		$faker = Factory::create(locale: 'fr_FR');
		for($i = 0 ; $i < 20; $i++) {
			$post = new Post();
			$post
				->setTitle($faker->realText(100))
				->setContent($faker->realText(300))
				->setAuthor($faker->name())
				->setPublishedAt(
					DateTimeImmutable::createFromMutable(
						$faker->dateTimeBetween(startDate: '-20 days', endDate: '+5 days')
					)
				);
			$manager->persist($post);
		}
		$manager->flush();
	}
}
