<?php

namespace App\Entity;

use App\Repository\SubclassRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=SubclassRepository::class)
 */
class Subclass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("read_class")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups("read_class")
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Le nom de la sous-classe doit contenir au moins {{ limit }} caractères",
     *      maxMessage = "Le nom de la sous-classe doit contenir au maximum {{ limit }} caractères"
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups("read_class")
     * @Assert\NotBlank
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=PlayableClass::class, inversedBy="subclasses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $playableClass;

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

    public function getPlayableClass(): ?PlayableClass
    {
        return $this->playableClass;
    }

    public function setPlayableClass(?PlayableClass $playableClass): self
    {
        $this->playableClass = $playableClass;

        return $this;
    }
}
