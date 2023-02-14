<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Put(),
        new Patch(),
    ],
    normalizationContext: [
        'groups' => ['book:read'],
    ],
    paginationItemsPerPage: 3
)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['book:read'])]
    public ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Groups(['book:read'])]
    public ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Isbn]
    public ?string $isbn = null;

    #[ORM\Column(nullable: true)]
    public ?int $numberPages = null;

    #[ORM\Column(length: 255)]
    #[Groups(['book:read'])]
    public ?string $author = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    public ?string $opinion = null;

    #[ORM\Column]
    public ?bool $lent = null;

    #[ORM\Column(length: 255)]
    public ?string $owner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(?string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getNumberPages(): ?int
    {
        return $this->numberPages;
    }

    public function setNumberPages(?int $numberPages): self
    {
        $this->numberPages = $numberPages;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getOpinion(): ?string
    {
        return $this->opinion;
    }

    public function setOpinion(?string $opinion): self
    {
        $this->opinion = $opinion;

        return $this;
    }

    public function isLent(): ?bool
    {
        return $this->lent;
    }

    public function setLent(bool $lent): self
    {
        $this->lent = $lent;

        return $this;
    }

    public function getOwner(): ?string
    {
        return $this->owner;
    }

    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }
}
