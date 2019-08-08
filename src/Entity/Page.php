<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Page
{
    private $name;

    private $slug;

    private $updatedAt;

    private $createdAt;

    private $position;

    private $id;

    private $menus;

    private $translates;

    private $galleries;

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->translates = new ArrayCollection();
        $this->galleries = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName() ?: '';
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setPage($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->contains($menu)) {
            $this->menus->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getPage() === $this) {
                $menu->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TranslatePage[]
     */
    public function getTranslates(): Collection
    {
        return $this->translates;
    }

    public function addTranslate(TranslatePage $translate): self
    {
        if (!$this->translates->contains($translate)) {
            $this->translates[] = $translate;
            $translate->setPage($this);
        }

        return $this;
    }

    public function removeTranslate(TranslatePage $translate): self
    {
        if ($this->translates->contains($translate)) {
            $this->translates->removeElement($translate);
            // set the owning side to null (unless already changed)
            if ($translate->getPage() === $this) {
                $translate->setPage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Gallery[]
     */
    public function getGalleries(): Collection
    {
        return $this->galleries;
    }

    public function addGallery(Gallery $gallery): self
    {
        if (!$this->galleries->contains($gallery)) {
            $this->galleries[] = $gallery;
        }

        return $this;
    }

    public function removeGallery(Gallery $gallery): self
    {
        if ($this->galleries->contains($gallery)) {
            $this->galleries->removeElement($gallery);
        }

        return $this;
    }
}
