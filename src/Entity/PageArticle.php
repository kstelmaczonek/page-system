<?php

namespace App\Entity;

use App\Repository\PageArticleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageArticleRepository::class)
 */
class PageArticle extends Page
{
    /**
     * @ORM\Column(type="datetime")
     */
    private $publish_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->publish_date;
    }

    public function setPublishDate(\DateTimeInterface $publish_date): self
    {
        $this->publish_date = $publish_date;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
