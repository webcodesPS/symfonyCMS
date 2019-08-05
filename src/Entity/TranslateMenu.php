<?php

namespace App\Entity;

class TranslateMenu
{
    private $name;

    private $locale;

    private $translate;

    private $id;

    private $menu;

    public function __toString()
    {
        return $this->getName() ?: '-';
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

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;

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

    public function getMenu(): ?Menu
    {
        return $this->menu;
    }

    public function setMenu(?Menu $menu): self
    {
        $this->menu = $menu;

        return $this;
    }
}
