<?php

namespace App\Entity;

use App\Repository\SubraceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: SubraceRepository::class)]
class Subrace
{
    #[Groups(['read_race', 'browse_subraces', 'read_subraces'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups(['read_race', 'browse_subraces', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255, minMessage: 'Le nom de la sous-race doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom de la sous-race doit contenir au maximum {{ limit }} caractères')]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\Url]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $imageUrl = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $strength = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $dexterity = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $constitution = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $wisdom = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $intelligence = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $charisma = null;

    #[Groups(['read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $trait = null;

    #[Groups('read_subraces')]
    #[ORM\ManyToOne(targetEntity: Race::class, inversedBy: 'subraces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?\App\Entity\Race $race = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getDexterity(): ?int
    {
        return $this->dexterity;
    }

    public function setDexterity(int $dexterity): self
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    public function getConstitution(): ?int
    {
        return $this->constitution;
    }

    public function setConstitution(int $constitution): self
    {
        $this->constitution = $constitution;

        return $this;
    }

    public function getWisdom(): ?int
    {
        return $this->wisdom;
    }

    public function setWisdom(int $wisdom): self
    {
        $this->wisdom = $wisdom;

        return $this;
    }

    public function getIntelligence(): ?int
    {
        return $this->intelligence;
    }

    public function setIntelligence(int $intelligence): self
    {
        $this->intelligence = $intelligence;

        return $this;
    }

    public function getCharisma(): ?int
    {
        return $this->charisma;
    }

    public function setCharisma(int $charisma): self
    {
        $this->charisma = $charisma;

        return $this;
    }

    public function getTrait(): ?string
    {
        return $this->trait;
    }

    public function setTrait(?string $trait): self
    {
        $this->trait = $trait;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }
}
