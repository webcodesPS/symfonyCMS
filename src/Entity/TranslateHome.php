<?php

namespace App\Entity;

class TranslateHome
{
    private $locale;

    private $position;

    private $name;

    private $translate;

    private $id;

    private $home;

    public function __toString()
    {
        return strtoupper($this->locale).' - '.$this->name ?: '';
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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTranslate(): ?string
    {
        return $this->translate;
    }

    public function setTranslate(?string $translate): self
    {
        $this->translate = $translate;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHome(): ?Home
    {
        return $this->home;
    }

    public function setHome(\App\Entity\Home $home = null): self
    {
        $this->home = $home;

        return $this;
    }
}
