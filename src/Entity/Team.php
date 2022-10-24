<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Assert\NotBlank(message: 'Le champ Name est obligatoire')]
    #[Assert\NotNull()]
    #[Assert\Choice(
        choices: ['on', 'off'],
        message: 'Le champ Name doit être on ou off',
    )]
    #[Assert\Length(min : 3, minMessage: 'Le nom doit faire au moins {{ limit }} caractères')]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getTeams"])]
    private ?string $Name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }
}
