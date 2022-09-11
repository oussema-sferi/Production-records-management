<?php

namespace App\Entity;

use App\Repository\FormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use DateTimeImmutable;

#[ORM\Entity(repositoryClass: FormRepository::class)]
class Form
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $reference;

    #[ORM\Column(length: 255)]
    private ?string $title;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'associatedForm', targetEntity: F28entry::class)]
    private Collection $f28entries;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->updatedAt = new DateTimeImmutable();
        $this->f28entries = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
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

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, F28entry>
     */
    public function getF28entries(): Collection
    {
        return $this->f28entries;
    }

    public function addF28entry(F28entry $f28entry): self
    {
        if (!$this->f28entries->contains($f28entry)) {
            $this->f28entries->add($f28entry);
            $f28entry->setAssociatedForm($this);
        }

        return $this;
    }

    public function removeF28entry(F28entry $f28entry): self
    {
        if ($this->f28entries->removeElement($f28entry)) {
            // set the owning side to null (unless already changed)
            if ($f28entry->getAssociatedForm() === $this) {
                $f28entry->setAssociatedForm(null);
            }
        }

        return $this;
    }

}
