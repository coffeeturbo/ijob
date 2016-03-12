<?php

namespace Ct\JobeetBundle\Repository;


use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
	public function getWithJobs()
	{
		$repository = $this->createQueryBuilder('c')
											 ->select('c')
											 ->leftJoin('CtJobeetBundle:Job', 'j', 'WITH', 'c.id = j.category')
											 ->where('j.expires_at > :expires')
											 ->setParameter('expires', date('Y-m-d H:i:s', time() - 86400 * 30))
		;

		$query = $repository->getQuery();

		return $query->getResult();
	}
}