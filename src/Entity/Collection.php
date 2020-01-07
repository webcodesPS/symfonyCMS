<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;

class Collection
{
  private $id;

  public function getId()
  {
    return $this->id;
  }

  private $name;

  private $elements;

  private $category;

  private $media;

  private $description;

  public function __toString()
  {
    return $this->name ?: '';
  }

  public function __construct()
  {
    $this->elements = new ArrayCollection();
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

  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  public function getDescription()
  {
    return $this->description;
  }
}
