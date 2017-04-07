<?php

namespace App\Model\Howdo;

use App\Model\TEntityManager;
use Doctrine\ORM\EntityNotFoundException;

class HowdoRequestDao
{
    use TEntityManager;

    /**
     * @param $keyword
     * @return array
     */
    public function findByFulltext($keyword)
    {
        return $this->em->getRepository(HowdoRequest::class)->createQueryBuilder('r')
            ->where('r.title LIKE :keyword')
            ->orWhere('r.description LIKE :keyword')
            ->setParameter('keyword', '%' . $keyword . '%')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $requestId
     * @return HowdoRequest
     * @throws EntityNotFoundException
     */
    public function findById($requestId)
    {
        $request = $this->em->getRepository(HowdoRequest::class)->find($requestId);

        if ($request === null) {
            throw new EntityNotFoundException('HowdoRequest with id `' . $requestId . '` not found.');
        }

        return $request;
    }
}

