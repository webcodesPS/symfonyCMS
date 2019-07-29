<?php

namespace App\Entity;

class HomeHasTranslate
{
    private $id;

    private $home;

    private $translate;

    private $position = 0;

    private $enabled = false;

    private $updatedAt;

    private $createdAt;

    public function __toString()
    {
        return $this->getHome().' | '.$this->getTranslate();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHome(): ?Home
    {
        return $this->home;
    }

    public function setHome(?Home $home): self
    {
        $this->home = $home;

        return $this;
    }

    public function getTranslate(): ?TranslateHome
    {
        return $this->translate;
    }

    public function setTranslate(?TranslateHome $translate): self
    {
        $this->translate = $translate;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
