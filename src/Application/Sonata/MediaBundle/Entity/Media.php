<?php

namespace App\Application\Sonata\MediaBundle\Entity;

use App\Entity\TranslateMedia;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sonata\MediaBundle\Entity\BaseMedia as BaseMedia;

/**
 * This file has been generated by the SonataEasyExtendsBundle.
 *
 * @link https://sonata-project.org/easy-extends
 *
 * References:
 * @link http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 */
class Media extends BaseMedia
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var \App\Entity\TranslateMedia
     */
    private $translates;

    public function __construct()
    {
        $this->translates = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set translate
     *
     * @param array $translates
     * @return Translates
     */
    public function setTranslate($translates)
    {
        $this->translates = $translates;

        return $this;
    }

    /**
     * Get translates
     *
     * @return string
     */
    public function getTranslate()
    {
        return $this->translates;
    }

    /**
     * @return Collection|TranslateMedia[]
     */
    public function getTranslates(): Collection
    {
        return $this->translates;
    }

    public function addTranslate(TranslateMedia $translate): self
    {
        if (!$this->translates->contains($translate)) {
            $this->translates[] = $translate;
            $translate->setMedia($this);
        }

        return $this;
    }

    public function removeTranslate(TranslateMedia $translate): self
    {
        if ($this->translates->contains($translate)) {
            $this->translates->removeElement($translate);
            // set the owning side to null (unless already changed)
            if ($translate->getMedia() === $this) {
                $translate->setMedia(null);
            }
        }

        return $this;
    }
}
