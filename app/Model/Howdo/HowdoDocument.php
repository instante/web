<?php

namespace App\Model\Howdo;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class HowdoDocument
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $document;

    /** @return int */
    public function getId()
    {
        return $this->id;
    }
}
