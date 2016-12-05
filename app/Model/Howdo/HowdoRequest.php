<?php

namespace App\Model\Howdo;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class HowdoRequest
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $searchedQuery;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $votes;

    /** @return int */
    public function getId()
    {
        return $this->id;
    }
}
