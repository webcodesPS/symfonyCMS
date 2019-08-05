<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class DataList
{
    private $laveled_title;

    private $name;

    private $enabled;

    private $left;

    private $right;

    private $level;

    private $id;

    private $children;

    private $root;

    private $parent;

    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getLaveledTitle(): ?string
    {
        return $this->laveled_title;
    }

    public function setLaveledTitle(?string $laveled_title): self
    {
        $this->laveled_title = $laveled_title;

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

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(?bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getLeft(): ?int
    {
        return $this->left;
    }

    public function setLeft(int $left): self
    {
        $this->left = $left;

        return $this;
    }

    public function getRight(): ?int
    {
        return $this->right;
    }

    public function setRight(int $right): self
    {
        $this->right = $right;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|DataList[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(DataList $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
            $child->setParent($this);
        }

        return $this;
    }

    public function removeChild(DataList $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
            // set the owning side to null (unless already changed)
            if ($child->getParent() === $this) {
                $child->setParent(null);
            }
        }

        return $this;
    }

    public function getRoot(): ?self
    {
        return $this->root;
    }

    public function setRoot(?self $root): self
    {
        $this->root = $root;

        return $this;
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
}
