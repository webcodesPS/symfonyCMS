<?php

namespace App\Entity;

class TranslateHome
{
    const LOCALE_EN = 'en';
    const LOCALE_PL = 'pl';
    const LOCALE_FR = 'fr';
    const LOCALE_DE = 'de';

    private $locale;

    private $name;

    private $translate;

    private $id;

    private $home;

    /**
     * Represent object as string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->name ?: '';
    }

    /**
     * Return frequency list
     *
     * @return array
     */
    public static function getLocaleList(): array
    {
        return [
            self::LOCALE_PL => 'pl',
            self::LOCALE_EN => 'en',
            self::LOCALE_FR => 'fr',
            self::LOCALE_DE => 'de',
        ];
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

    public function setHome(?Home $home): self
    {
        $this->home = $home;

        return $this;
    }
}
