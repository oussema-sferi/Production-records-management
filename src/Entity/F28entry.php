<?php

namespace App\Entity;

use App\Repository\F28entryRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: F28entryRepository::class)]
class F28entry
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $batchNumber = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $inputTime = null;

    #[ORM\Column]
    private ?float $inputQuantity = null;

    #[ORM\Column]
    private ?int $inputTemperature = null;

    #[ORM\Column(length: 255)]
    private ?string $inputRecordedBy = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $outputTime = null;

    #[ORM\Column]
    private ?float $outputQuantity = null;

    #[ORM\Column]
    private ?int $outputTemperature = null;

    #[ORM\Column(length: 255)]
    private ?string $outputRecordedBy = null;

    #[ORM\ManyToOne(inversedBy: 'f28entries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Form $associatedForm = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(?\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getBatchNumber(): ?string
    {
        return $this->batchNumber;
    }

    public function setBatchNumber(?string $batchNumber): self
    {
        $this->batchNumber = $batchNumber;

        return $this;
    }

    public function getInputTime(): ?\DateTimeImmutable
    {
        return $this->inputTime;
    }

    public function setInputTime(\DateTimeImmutable $inputTime): self
    {
        $this->inputTime = $inputTime;

        return $this;
    }

    public function getInputQuantity(): ?float
    {
        return $this->inputQuantity;
    }

    public function setInputQuantity(float $inputQuantity): self
    {
        $this->inputQuantity = $inputQuantity;

        return $this;
    }

    public function getInputTemperature(): ?int
    {
        return $this->inputTemperature;
    }

    public function setInputTemperature(int $inputTemperature): self
    {
        $this->inputTemperature = $inputTemperature;

        return $this;
    }

    public function getInputRecordedBy(): ?string
    {
        return $this->inputRecordedBy;
    }

    public function setInputRecordedBy(string $inputRecordedBy): self
    {
        $this->inputRecordedBy = $inputRecordedBy;

        return $this;
    }

    public function getOutputTime(): ?\DateTimeImmutable
    {
        return $this->outputTime;
    }

    public function setOutputTime(\DateTimeImmutable $outputTime): self
    {
        $this->outputTime = $outputTime;

        return $this;
    }

    public function getOutputQuantity(): ?float
    {
        return $this->outputQuantity;
    }

    public function setOutputQuantity(float $outputQuantity): self
    {
        $this->outputQuantity = $outputQuantity;

        return $this;
    }

    public function getOutputTemperature(): ?int
    {
        return $this->outputTemperature;
    }

    public function setOutputTemperature(int $outputTemperature): self
    {
        $this->outputTemperature = $outputTemperature;

        return $this;
    }

    public function getOutputRecordedBy(): ?string
    {
        return $this->outputRecordedBy;
    }

    public function setOutputRecordedBy(string $outputRecordedBy): self
    {
        $this->outputRecordedBy = $outputRecordedBy;

        return $this;
    }

    public function getAssociatedForm(): ?Form
    {
        return $this->associatedForm;
    }

    public function setAssociatedForm(?Form $associatedForm): self
    {
        $this->associatedForm = $associatedForm;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
