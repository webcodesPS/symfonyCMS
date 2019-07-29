<?php

namespace App\Entity;

use App\Application\Sonata\MediaBundle\Entity\Gallery;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Home
{
    private $name;

    private $slug;

    private $updatedAt;

    private $createdAt;

    private $id;

    private $translates;

    private $galleries;

    protected $homeHasTranslates;

    public function __construct()
    {
        $this->translates = new ArrayCollection();
        $this->galleries = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName() ?: '-';
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

    public function setSlug(?string $slug): self
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

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|TranslateHome[]
     */
    public function getTranslates(): Collection
    {
        return $this->translates;
    }

    public function addTranslate(TranslateHome $translate): self
    {
        if (!$this->translates->contains($translate)) {
            $this->translates[] = $translate;
            $translate->setHome($this);
        }

        return $this;
    }

    public function removeTranslate(TranslateHome $translate): self
    {
        if ($this->translates->contains($translate)) {
            $this->translates->removeElement($translate);
            // set the owning side to null (unless already changed)
            if ($translate->getHome() === $this) {
                $translate->setHome(null);
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

    public function setHomeHasTranslates($homeHasTranslates)
    {
        $this->homeHasTranslates = new ArrayCollection();

        foreach ($homeHasTranslates as $homeHasTranslate) {
            $this->addHomeHasTranslate($homeHasTranslate);
        }
    }

    public function getHomeHasTranslates()
    {
        return $this->homeHasTranslates;
    }

    public function addHomeHasTranslate(HomeHasTranslate $homeHasTranslate)
    {
        $homeHasTranslate->setHome($this);

        $this->homeHasTranslates[] = $homeHasTranslate;
    }

    public function removeHomeHasTranslate(HomeHasTranslate $homeHasTranslate)
    {
        $this->homeHasTranslates->removeElement($homeHasTranslate);
    }

    public function addHomeHasTranslates(HomeHasTranslate $homeHasTranslate)
    {
        @trigger_error(
            'The '.__METHOD__.' is deprecated and will be removed with next major release.'
            .'Use `addhomeHasTranslate` method instead.',
            E_USER_DEPRECATED
        );
        $this->addHomeHasTranslate($homeHasTranslate);
    }

    public function reorderHomeHasTranslate()
    {
        if ($this->getHomeHasTranslates() && $this->getHomeHasTranslates() instanceof \IteratorAggregate) {
            // reorder
            $iterator = $this->getHomeHasTranslates()->getIterator();

            $iterator->uasort(static function ($a, $b) {
                if ($a->getPosition() === $b->getPosition()) {
                    return 0;
                }

                return $a->getPosition() > $b->getPosition() ? 1 : -1;
            });

            $this->setHomeHasTranslates($iterator);
        }
    }

    public function isHomeHasTranslate(): array
    {
        return [];
    }
}
