<?php

namespace App\Entity;

use App\Repository\WishlistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WishlistRepository::class)]
class Wishlist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @ORM\ManyToMany(targetEntity="Gift")
     * @ORM\JoinTable(name="wishlist_gifts",
     *      joinColumns={@ORM\JoinColumn(name="wishlist_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="gift_id", referencedColumnName="id")}
     * )
     */
    private Collection $gifts;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $message = null;

    public function __construct()
    {
        $this->gifts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Gift[]
     */
    public function getGifts(): Collection
    {
        return $this->gifts;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function addGift(Gift $gift): self
    {
        if (!$this->gifts->contains($gift)) {
            $this->gifts[] = $gift;
        }

        return $this;
    }
}
