<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Element
{
    private $id;

    private $name;

    private $collections;

    public function getId()
    {
      return $this->id;
    }

    public function __toString()
    {
      return $this->name ?: '';
    }

    public function __construct()
    {
      $this->collections = new ArrayCollection();
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

    public function addCollection(Collection $collections)
    {
      $this->collections[] = $collections;

      return $this;
    }

    public function removeCollection(Collection $collections)
    {
      $this->collections->removeElement($collections);
    }

    public function getCollections()
    {
      return $this->collections;
    }
}
