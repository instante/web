<?php

namespace App\Model\Howdo;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(indexes={
 *     @ORM\Index(columns={"title"}, flags={"fulltext"}),
 *     @ORM\Index(columns={"document"}, flags={"fulltext"})
 * })
 */
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $document;

    /**
     * @var HowdoKeyword[]|ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Model\Howdo\HowdoKeyword", mappedBy="document")
     */
    private $keywords;

    /**
     * @param string $title
     * @param string $document
     */
    public function __construct($title, $document)
    {
        $this->title = $title;
        $this->document = $document;
        $this->keywords = new ArrayCollection();
    }


    /** @return int */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * 
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }

    /**
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param string $document
     *
     * @return self
     */
    public function setDocument($document)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return HowdoKeyword[]
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param HowdoKeyword $keyword
     *
     * @return self
     */
    public function addKeyword(HowdoKeyword $keyword)
    {
        if (!$this->keywords->contains($keyword)) {
            $this->keywords->add($keyword);
        }

        return $this;
    }
}

