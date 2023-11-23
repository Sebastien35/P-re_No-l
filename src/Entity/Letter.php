<?php

namespace App\Entity;

use App\Repository\LetterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LetterRepository::class)]
class Letter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $sender_name = null;

    #[ORM\Column(length: 2000)]
    private ?string $letter_content = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenderName(): ?string
    {
        return $this->sender_name;
    }

    public function setSenderName(string $sender_name): static
    {
        $this->sender_name = $sender_name;

        return $this;
    }

    public function getLetterContent(): ?string
    {
        return $this->letter_content;
    }

    public function setLetterContent(string $letter_content): static
    {
        $this->letter_content = $letter_content;

        return $this;
    }
}
