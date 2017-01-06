<?php

namespace App\Model\Howdo;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={@ORM\Index(columns={"keyword"}, flags={"fulltext"})})
 */
class HowdoKeyword
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $keyword;

    /**
     * @ORM\ManyToOne(targetEntity="App\Model\Howdo\HowdoDocument", inversedBy="keywords")
     * @var HowdoDocument
     */
    private $document;
}

