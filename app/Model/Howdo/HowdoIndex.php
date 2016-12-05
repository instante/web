<?php

namespace App\Model\Howdo;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={@ORM\Index(columns={"key_phrase"}, flags={"fulltext"})})
 */
class HowdoIndex
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
    private $keyPhrase;

    /**
     * @ORM\ManyToOne(targetEntity="App\Model\Howdo\HowdoDocument")
     * @var HowdoDocument
     */
    private $document;
}
