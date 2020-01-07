<?php

namespace App\Entity;

class Category
{
  private $id;

  private $name;

  public function getId()
  {
    return $this->id;
  }

  public function __toString()
  {
    return $this->name ?: '';
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
}
