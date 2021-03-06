<?php

namespace App\Entity;

class ContentElement
{
  private $id;

  private $locale;

  private $content;

  private $element;

  public function __toString()
  {
    return $this->getContent() .' - '.strtoupper($this->getLocale()) ?: '';
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getLocale(): ?string
  {
    return $this->locale;
  }

  public function setLocale(?string $locale): self
  {
    $this->locale = $locale;

    return $this;
  }

  public function getContent(): ?string
  {
    return $this->content;
  }

  public function setContent(?string $content): self
  {
    $this->content = $content;

    return $this;
  }

  public function getElement(): ?Element
  {
    return $this->element;
  }

  public function setElement(?Element $element): self
  {
    $this->element = $element;

    return $this;
  }
}
