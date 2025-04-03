<?php

namespace App\Repository;

use App\Entity\Post;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

	public function getAllPublish():array {
		return $this
			->createQueryBuilder(alias: 'p')
			->where('p.publishedAt <= :now')
			->orderBy('p.publishedAt', 'ASC')
			->setParameter('now', new DateTime(), type: Types::DATETIME_MUTABLE)
			->getQuery()
			->getResult();
	}

	public function getPostById(int $id):array {
		return $this
			->createQueryBuilder(alias: 'p', indexBy: $id)
			->getQuery()
			->getResult();
	}
}
