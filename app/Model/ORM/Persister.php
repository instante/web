<?php

namespace App\Model;

use Doctrine\ORM\EntityManager;

class Persister implements IPersister
{
    /** @var EntityManager */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function flush()
    {
        $this->em->flush();
    }

    public function persist($entity)
    {
        $this->em->persist($entity);
    }

    public function save($entity)
    {
        $this->persist($entity);
        $this->flush();
    }

    public function remove($entity)
    {
        $this->em->remove($entity);
    }

    public function delete($entity)
    {
        $this->remove($entity);
        $this->flush();
    }
}
