<?php

namespace App\Entity;

use App\Repository\PlayableClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlayableClassRepository::class)]
class PlayableClass
{
    #[Groups(['browse_class', 'read_class'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[Groups(['browse_class', 'read_class'])]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 255, minMessage: 'Le nom de la sous-classe doit contenir au moins {{ limit }} caractères', maxMessage: 'Le nom de la sous-classe doit contenir au maximum {{ limit }} caractères')]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name = null;

    #[Groups('read_class')]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[Groups('read_class')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, minMessage: 'Il faut au minimum trois caractères')]
    #[ORM\Column(type: 'string', length: 50)]
    private ?string $lifeDice = null;

    /**
     * The image URL to the folder asset (this is the part send in DB).
     */
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $imageUrl = null;

    /**
     * The image encode in base64 (only used in JSON response).
     */
    #[Groups(['browse_class', 'read_class'])]
    private ?string $image = null;

    /**
     * The image file (only used in form for uploading).
     */
    private $imageFile;

    #[Groups('read_class')]
    #[ORM\OneToMany(mappedBy: 'playableClass', targetEntity: Subclass::class, orphanRemoval: true)]
    private ArrayCollection|array $subclasses;

    #[ORM\ManyToMany(targetEntity: Ability::class, inversedBy: 'playableClasses')]
    private ArrayCollection|array $abilities;

    #[Groups('read_class')]
    #[ORM\ManyToMany(targetEntity: Armor::class, inversedBy: 'playableClasses')]
    private ArrayCollection|array $armors;

    #[Groups('read_class')]
    #[ORM\ManyToMany(targetEntity: Weapon::class, inversedBy: 'playableClasses')]
    private ArrayCollection|array $weapons;

    #[Groups('read_class')]
    #[ORM\OneToMany(mappedBy: 'playableClass', targetEntity: PlayableClassItem::class, cascade: ['persist'], orphanRemoval: true)]
    private ArrayCollection|array $playableClassItems;

    #[Groups('browse_class')]
    #[ORM\Column(type: 'text')]
    private ?string $quickDescription = null;

    public function __construct()
    {
        $this->subclasses = new ArrayCollection();
        $this->abilities = new ArrayCollection();
        $this->armors = new ArrayCollection();
        $this->weapons = new ArrayCollection();
        $this->playableClassItems = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLifeDice(): ?string
    {
        return $this->lifeDice;
    }

    public function setLifeDice(string $lifeDice): self
    {
        $this->lifeDice = $lifeDice;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * @return Collection<int, Subclass>
     */
    public function getSubclasses(): Collection
    {
        return $this->subclasses;
    }

    public function addSubclass(Subclass $subclass): self
    {
        if (!$this->subclasses->contains($subclass)) {
            $this->subclasses[] = $subclass;
            $subclass->setPlayableClass($this);
        }

        return $this;
    }

    public function removeSubclass(Subclass $subclass): self
    {
        if ($this->subclasses->removeElement($subclass)) {
            // set the owning side to null (unless already changed)
            if ($subclass->getPlayableClass() === $this) {
                $subclass->setPlayableClass(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Ability>
     */
    public function getAbilities(): Collection
    {
        return $this->abilities;
    }

    public function addAbility(Ability $ability): self
    {
        if (!$this->abilities->contains($ability)) {
            $this->abilities[] = $ability;
        }

        return $this;
    }

    public function removeAbility(Ability $ability): self
    {
        $this->abilities->removeElement($ability);

        return $this;
    }

    /**
     * @return Collection<int, Armor>
     */
    public function getArmors(): Collection
    {
        return $this->armors;
    }

    public function addArmor(Armor $armor): self
    {
        if (!$this->armors->contains($armor)) {
            $this->armors[] = $armor;
        }

        return $this;
    }

    public function removeArmor(Armor $armor): self
    {
        $this->armors->removeElement($armor);

        return $this;
    }

    /**
     * @return Collection<int, Weapon>
     */
    public function getWeapons(): Collection
    {
        return $this->weapons;
    }

    public function addWeapon(Weapon $weapon): self
    {
        if (!$this->weapons->contains($weapon)) {
            $this->weapons[] = $weapon;
        }

        return $this;
    }

    public function removeWeapon(Weapon $weapon): self
    {
        $this->weapons->removeElement($weapon);

        return $this;
    }

    /**
     * @return Collection<int, PlayableClassItem>
     */
    public function getPlayableClassItems(): Collection
    {
        return $this->playableClassItems;
    }

    public function addPlayableClassItem(PlayableClassItem $playableClassItem): self
    {
        if (!$this->playableClassItems->contains($playableClassItem)) {
            $this->playableClassItems[] = $playableClassItem;
            $playableClassItem->setPlayableClass($this);
        }

        return $this;
    }

    public function removePlayableClassItem(PlayableClassItem $playableClassItem): self
    {
        if ($this->playableClassItems->removeElement($playableClassItem)) {
            // set the owning side to null (unless already changed)
            if ($playableClassItem->getPlayableClass() === $this) {
                $playableClassItem->setPlayableClass(null);
            }
        }

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
     * Get the value of image.
     *
     * @return string
     */
    public function getImage()
    {
        $this->image = base64_encode(file_get_contents($this->imageUrl));

        return $this->image;
    }

    /**
     * Get the.
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the.
     *
     * @param mixed $imageFile
     *
     * @return self
     */
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
