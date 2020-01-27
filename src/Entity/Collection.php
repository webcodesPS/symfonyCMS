<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;

class Collection
{
    private $id;

    private $name;

    private $elements;

    private $category;

    private $media;

    public function __toString()
    {
       return $this->name ?: '';
    }

    public function __construct()
    {
       $this->elements = new ArrayCollection();
    }

    public function getId()
    {
      return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addElement(Element $elements)
    {
        $this->elements[] = $elements;

        return $this;
    }

    public function removeElement(Element $elements)
    {
       $this->elements->removeElement($elements);
    }

    public function getElements()
    {
       return $this->elements;
    }

    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia(Media $media)
    {
        $this->media = $media;
    }
}
