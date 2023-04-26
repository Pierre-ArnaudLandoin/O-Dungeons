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
     *
     * @ORM\GeneratedValue
     *
     * @ORM\Column(type="integer")
     */
    #[Groups(['browse_race', 'read_race', 'read_subraces'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['browse_race', 'read_race', 'read_subraces'])]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255, minMessage: 'Le nom de la race doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom de la race doit contenir au maximum {{ limit }} caractères')]
    private ?string $name = null;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups('read_race')]
    #[Assert\NotBlank]
    private ?string $fullDescription = null;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['browse_race', 'read_race'])]
    #[Assert\NotBlank]
    private ?string $quickDescription = null;

    /**
     * @ORM\OneToMany(targetEntity=Subrace::class, mappedBy="race", orphanRemoval=true)
     */
    #[Groups('read_race')]
    private \Doctrine\Common\Collections\ArrayCollection|array $subraces;

    /**
     * The URL to asset folder for this image.
     *
     * @ORM\Column(type="string", length=255)
     */
    private ?string $imageUrl = null;

    /**
     * The image encode in base64.
     */
    #[Groups(['browse_race', 'read_race'])]
    private ?string $image = null;

    /**
     * The image file.
     */
    private $imageFile;

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

    /**
     * Get the value of image.
     */
    public function getImage()
    {
        if ($this->imageUrl !== null) {
            $this->image = base64_encode(file_get_contents($this->imageUrl));
        }

        return $this->image;
    }

    /**
     * Set the value of image.
     *
     * @return self
     */
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of imageFile.
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile.
     *
     * @return self
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
