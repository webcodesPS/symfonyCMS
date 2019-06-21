<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Menu
{
    private $name;

    private $id;

    private $parent;

    private $translates;

    private $page;

    public function __construct()
    {
        $this->translates = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name ?: '';
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|TranslateMenu[]
     */
    public function getTranslates(): Collection
    {
        return $this->translates;
    }

    public function addTranslate(TranslateMenu $translate): self
    {
        if (!$this->translates->contains($translate)) {
            $this->translates[] = $translate;
            $translate->setMenu($this);
        }

        return $this;
    }

    public function removeTranslate(TranslateMenu $translate): self
    {
        if ($this->translates->contains($translate)) {
            $this->translates->removeElement($translate);
            // set the owning side to null (unless already changed)
            if ($translate->getMenu() === $this) {
                $translate->setMenu(null);
            }
        }

        return $this;
    }

    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPage(?Page $page): self
    {
        $this->page = $page;

        return $this;
    }
}
