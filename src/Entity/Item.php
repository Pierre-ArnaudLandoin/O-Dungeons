<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[Groups(['read_class', 'read_backgrounds'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups(['read_class', 'read_backgrounds'])]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name = null;

    #[Groups(['read_class', 'read_backgrounds'])]
    #[Assert\NotBlank]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'float')]
    private ?float $weight = null;

    #[ORM\ManyToMany(targetEntity: Background::class, mappedBy: 'items')]
    private \Doctrine\Common\Collections\ArrayCollection|array $backgrounds;

    #[ORM\OneToMany(targetEntity: PlayableClassItem::class, mappedBy: 'item', orphanRemoval: true)]
    private \Doctrine\Common\Collections\ArrayCollection|array $playableClassItems;

    public function __construct()
    {
        $this->backgrounds = new ArrayCollection();
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

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection<int, Background>
     */
    public function getBackgrounds(): Collection
    {
        return $this->backgrounds;
    }

    public function addBackground(Background $background): self
    {
        if (!$this->backgrounds->contains($background)) {
            $this->backgrounds[] = $background;
            $background->addItem($this);
        }

        return $this;
    }

    public function removeBackground(Background $background): self
    {
        if ($this->backgrounds->removeElement($background)) {
            $background->removeItem($this);
        }

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
            $playableClassItem->setItem($this);
        }

        return $this;
    }

    public function removePlayableClassItem(PlayableClassItem $playableClassItem): self
    {
        if ($this->playableClassItems->removeElement($playableClassItem)) {
            // set the owning side to null (unless already changed)
            if ($playableClassItem->getItem() === $this) {
                $playableClassItem->setItem(null);
            }
        }

        return $this;
    }
}
