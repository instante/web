<?php

namespace App\Model\Howdo;


use App\Model\TEntityManager;

class HowdoDocumentDao
{
    use TEntityManager;

    public function findByFulltext($keyword)
    {
        return $this->em->getRepository(HowdoDocument::class)->createQueryBuilder('d')
            ->leftJoin(HowdoKeyword::class, 'k', 'WITH', 'k.document = d.id')
            ->where('d.title LIKE :keyword')
            ->orWhere('d.document LIKE :keyword')
            ->orWhere('k.keyword LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->getQuery()
            ->getResult();
    }
}

