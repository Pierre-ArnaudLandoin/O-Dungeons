<?php

namespace App\Entity;

use App\Repository\BackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BackgroundRepository::class)]
class Background
{
    #[Groups(['browse_backgrounds', 'read_backgrounds'])]
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[Groups(['browse_backgrounds', 'read_backgrounds'])]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 255)]
    private ?string $name = null;

    #[Groups('read_backgrounds')]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'string', length: 50)]
    private ?string $capacities = null;

    #[Groups('read_backgrounds')]
    #[Assert\NotBlank]
    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[Groups('read_backgrounds')]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer', options: ['default' => 0])]
    private ?int $nbLanguage = null;

    #[Groups('read_backgrounds')]
    #[ORM\ManyToMany(targetEntity: Item::class, inversedBy: 'backgrounds')]
    private ArrayCollection|array $items;

    #[Groups('read_backgrounds')]
    #[Assert\PositiveOrZero]
    #[ORM\Column(type: 'integer')]
    private ?int $nbGolds = null;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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

    public function getCapacities(): ?string
    {
        return $this->capacities;
    }

    public function setCapacities(string $capacities): self
    {
        $this->capacities = $capacities;

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

    public function getNbLanguage(): ?int
    {
        return $this->nbLanguage;
    }

    public function setNbLanguage(int $nbLanguage): self
    {
        $this->nbLanguage = $nbLanguage;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        $this->items->removeElement($item);

        return $this;
    }

    public function getNbGolds(): ?int
    {
        return $this->nbGolds;
    }

    public function setNbGolds(int $nbGolds): self
    {
        $this->nbGolds = $nbGolds;

        return $this;
    }
}
