<?php

namespace App\Entity;

use App\Repository\RaceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RaceRepository::class)
 */
class Race
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("browse_race")
     * @Groups("read_race")
     * @Groups("read_subraces")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("browse_race")
     * @Groups("read_race")
     * @Groups("read_subraces")
     * @Assert\NotBlank
     * @Assert\Length(max=255, maxMessage="Nombre de caractères autorisés dépassés ({{ value }}), maximum 255")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups("read_race")
     * @Assert\NotBlank
     */
    private $fullDescription;

    /**
     * @ORM\Column(type="text")
     * @Groups("browse_race")
     * @Groups("read_race")
     * @Assert\NotBlank
     */
    private $quickDescription;

    /**
     * @ORM\OneToMany(targetEntity=Subrace::class, mappedBy="race", orphanRemoval=true)
     * @Groups("read_race")
     */
    private $subraces;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("browse_race")
     * @Groups("read_race")
     * @Assert\NotBlank
     * @Assert\Url
     */
    private $imageUrl;

    public function __construct()
    {
        $this->subraces = new ArrayCollection();
    }

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

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getQuickDescription(): ?string
    {
        return $this->quickDescription;
    }

    public function setQuickDescription(string $quickDescription): self
    {
        $this->quickDescription = $quickDescription;

        return $this;
    }

    /**
     * @return Collection<int, Subrace>
     */
    public function getSubraces(): Collection
    {
        return $this->subraces;
    }

    public function addSubrace(Subrace $subrace): self
    {
        if (!$this->subraces->contains($subrace)) {
            $this->subraces[] = $subrace;
            $subrace->setRace($this);
        }

        return $this;
    }

    public function removeSubrace(Subrace $subrace): self
    {
        if ($this->subraces->removeElement($subrace)) {
            // set the owning side to null (unless already changed)
            if ($subrace->getRace() === $this) {
                $subrace->setRace(null);
            }
        }

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
}
