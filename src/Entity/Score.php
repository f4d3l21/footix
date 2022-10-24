<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Assert\NotBlank(message: 'Le champ id est obligatoire')]
    #[Assert\NotNull()]
    #[Assert\Length()]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $scoreTeamA = null;

    #[ORM\Column(length: 255)]
    private ?string $scoreTeamB = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $scoreDate = null;

    #[ORM\Column(length: 255)]
    private ?string $scoreResultat = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreTeamA(): ?string
    {
        return $this->scoreTeamA;
    }

    public function setScoreTeamA(string $scoreTeamA): self
    {
        $this->scoreTeamA = $scoreTeamA;

        return $this;
    }

    public function getScoreTeamB(): ?string
    {
        return $this->scoreTeamB;
    }

    public function setScoreTeamB(string $scoreTeamB): self
    {
        $this->scoreTeamB = $scoreTeamB;

        return $this;
    }

    public function getScoreDate(): ?\DateTimeInterface
    {
        return $this->scoreDate;
    }

    public function setScoreDate(\DateTimeInterface $scoreDate): self
    {
        $this->scoreDate = $scoreDate;

        return $this;
    }

    public function getScoreResultat(): ?string
    {
        return $this->scoreResultat;
    }

    public function setScoreResultat(string $scoreResultat): self
    {
        $this->scoreResultat = $scoreResultat;

        return $this;
    }
}
