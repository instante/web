<?php

namespace App\Model;

use Doctrine\ORM\EntityManager;

trait TEntityManager
{
    /** @var EntityManager */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

}
